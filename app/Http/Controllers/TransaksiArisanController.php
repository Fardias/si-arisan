<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\TransaksiArisan;
use Illuminate\Http\Request;

class TransaksiArisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TransaksiArisan::with('anggota')->get();
        return view('dashboard.transaksi-arisan.main', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = Anggota::all();
        return view('dashboard.transaksi-arisan.tambah', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'periode' => 'required|date',
            'total_setoran' => 'required|numeric',
            'status_sudah_lunas' => 'required|boolean',
            'status_menang_arisan' => 'required|boolean',
        ]);

        $checkTransaksi = TransaksiArisan::where('anggota_id', $request->anggota_id)
            ->where('periode', $request->periode)
            ->first();
         
        if ($checkTransaksi) {
            return redirect()->route('transaksi-arisan.index')->with('error', 'Transaksi untuk anggota ini pada periode ini sudah ada.');

        }

        TransaksiArisan::create($request->all());

        return redirect()->route('transaksi-arisan.index')->with('success', 'Transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = TransaksiArisan::findOrFail($id);
        $anggota = Anggota::all(); // Get all anggota for the dropdown
        // Pass the transaksi and anggotas to the view
        return view('dashboard.transaksi-arisan.edit', compact('transaksi', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'periode' => 'required|date',
            'total_setoran' => 'required|numeric',
            'status_sudah_lunas' => 'required|boolean',
            'status_menang_arisan' => 'required|boolean',
        ]);
        $transaksi = TransaksiArisan::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi-arisan.index')->with('success', 'Transaksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = TransaksiArisan::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi-arisan.index')->with('success', 'Transaksi deleted successfully.');
    }
}
