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
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/login/proses-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/login/proses-register', [BackController::class, 'postregister'])->name('post-register');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // PENGADUAN ROUTE
    Route::get('/pengaduan/pembuatan-pengaduan', [PengaduanController::class, 'pembuatan_pengaduan'])->name('pembuatan-pengaduan');
    Route::post('/pengaduan/post-pembuatan-pengaduan', [PengaduanController::class, 'post_pembuatan_pengaduan'])->name('post-pembuatan-pengaduan');

    // KRITIK DAN SARAN ROUTE
    Route::get('/kritik-dan-saran/pembuatan-kritiksaran', [KritiksaranController::class, 'pembuatan_kritiksaran'])->name('pembuatan-kritiksaran');
    Route::post('/kritik-dan-saran/post-pembuatan-kritiksaran', [KritiksaranController::class, 'post_pembuatan_kritiksaran'])->name('post-pembuatan-kritiksaran');
});
