<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\TransaksiArisan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $get_anggota = Anggota::all();
        $total_anggota = Anggota::count();

        $total_uang = TransaksiArisan::all()
            ->sum('total_setoran');
        $sudah_lunas = TransaksiArisan::where('status_sudah_lunas', true)
            ->distinct('anggota_id')
            ->count('anggota_id');

        $anggotaBaru = Anggota::select('id', 'nama', 'created_at')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'tipe' => 'anggota',
                    'nama' => $item->nama,
                    'created_at' => $item->created_at,
                    'keterangan' => 'Anggota baru terdaftar',
                ];
            });

        $transaksiBaru = TransaksiArisan::with('anggota')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'tipe' => 'transaksi',
                    'nama' => optional($item->anggota)->nama,
                    'created_at' => $item->created_at,
                    'keterangan' => $item->status_sudah_lunas
                        ? 'Transaksi lunas oleh'
                        : 'Transaksi belum lunas oleh',
                ];
            });

        $aktivitas = $anggotaBaru
            ->merge($transaksiBaru)
            ->sortByDesc('created_at')
            ->values();

        $total_transaksi_bulan_ini = TransaksiArisan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_setoran');



        return view('dashboard.main', compact('total_anggota', 'get_anggota', 'total_uang', 'sudah_lunas', 'aktivitas','total_transaksi_bulan_ini'));
    }
}
