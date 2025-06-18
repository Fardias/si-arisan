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
        $total_uang = TransaksiArisan::all()->sum('total_setoran');
        return view('dashboard.main', compact('total_anggota', 'get_anggota','total_uang'));
    }
}
