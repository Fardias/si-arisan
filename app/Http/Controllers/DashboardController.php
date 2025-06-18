<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $get_anggota = Anggota::all();
        $total_anggota = Anggota::count();
        return view('dashboard.main', compact('total_anggota', 'get_anggota'));
    }
}
