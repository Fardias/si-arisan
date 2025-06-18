<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiArisanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// dahsboard anggota route
// resource route
Route::resource('anggota', AnggotaController::class);  
// dashboard transaksi arisan route
Route::resource('transaksi-arisan', TransaksiArisanController::class);