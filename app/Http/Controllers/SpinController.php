<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\TransaksiArisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpinController extends Controller
{
    public function spin()
    {
        $anggotaMenang = TransaksiArisan::where('status_menang_arisan', 1)
            ->pluck('anggota_id');

        $anggota = Anggota::where('status_keikutsertaan', 1)
            ->whereNotIn('id', $anggotaMenang)
            ->get();

        if ($anggota->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada anggota yang tersedia untuk spin arisan.');
        }

        $dataPeserta = $anggota->map(function ($a) {
            return [
                'id' => $a->id,
                'nama' => $a->nama,
            ];
        });

        return view('dashboard.spin-arisan.main', [
            'anggota' => $dataPeserta,
            'title' => 'Spin Arisan',
            'active' => 'spin-arisan',
        ]);
    }


    public function spinResult(Request $request)
    {
        $anggotaId = $request->input('anggota_id');

        if (empty($anggotaId)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada anggota yang dipilih.'], 400);
        }

        try {
            $anggota = Anggota::findOrFail($anggotaId);

            $transaksi = TransaksiArisan::where('anggota_id', $anggotaId)
                ->where('status_sudah_lunas', 1)
                ->first();

            if ($transaksi) {
                $transaksi->status_menang_arisan = 1;
                
                $transaksi->save();
            } else {
                Log::warning("Transaksi lunas untuk anggota ID: {$anggotaId} tidak ditemukan saat spin.");
                return response()->json(['success' => true, 'message' => 'Pemenang terpilih, namun tidak ada transaksi lunas yang ditemukan untuk diupdate.'], 200);
            }

            return response()->json(['success' => true, 'message' => 'Status pemenang ' . $anggota->nama . ' berhasil diperbarui.']);

        } catch (\Exception $e) {
            Log::error('Error saat update status pemenang arisan: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan pada server.'], 500);
        }
    }
}
