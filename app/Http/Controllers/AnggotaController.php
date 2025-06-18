<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Anggota::all();
        return view('dashboard.anggota.main', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.anggota.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'status_keikutsertaan' => 'required',
            'tanggal_bergabung' => 'required|date',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota created successfully.');
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
        $anggota = Anggota::findOrFail($id);
        return view('dashboard.anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'status_keikutsertaan' => 'required',
            'tanggal_bergabung' => 'required|date',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota deleted successfully.');
    }
}
