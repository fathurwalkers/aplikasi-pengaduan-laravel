<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KritiksaranController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function() {
    return redirect()->route('dashboard');
});

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/login/proses-login', [BackController::class, 'postlogin'])->name('post-login');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // PENGADUAN ROUTE
    Route::post('/pengaduan/pembuatan-pengaduan', [PengaduanController::class, 'pembuatan_pengaduan'])->name('pembuatan-pengaduan');
    Route::post('/pengaduan/post-pembuatan-pengaduan', [PengaduanController::class, 'post_pembuatan_pengaduan'])->name('post-pembuatan-pengaduan');

    // KRITIK DAN SARAN ROUTE
    Route::get('/kritik-dan-saran/pembuatan-kritiksaran', [KritiksaranController::class, 'pembuatan_kritiksaran'])->name('pembuatan-kritiksaran');
});
