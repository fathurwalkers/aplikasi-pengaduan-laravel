<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KritiksaranController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', Index::class)->name('dashboard');

    // PENGADUAN ROUTE
    Route::get('/pengaduan/pembuatan-pengaduan', PengaduanController::class)->name('pembuatan-pengaduan');

    // KRITIK DAN SARAN ROUTE
    Route::get('/pengaduan/pembuatan-kritik-saran', KritiksaranController::class)->name('pembuatan-kritik-saran');
});

Route::get('/login', AuthLogin::class)->name('login');
