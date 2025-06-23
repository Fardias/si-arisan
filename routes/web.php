<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiArisanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpinController;

Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('anggota', AnggotaController::class);
    Route::resource('transaksi-arisan', TransaksiArisanController::class);

    Route::get('/spin-arisan', [SpinController::class, 'spin'])->name('spin-arisan');
    Route::post('/spin-arisan', [SpinController::class, 'spinResult'])->name('spin-arisan.result');
});
