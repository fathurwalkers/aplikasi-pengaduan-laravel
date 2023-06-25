<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\BeritaController;
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

    // BERITA ROUTE
    Route::group(['prefix' => '/berita'], function () {
        Route::get('/', function () {
            return redirect()->route('daftar-berita');
        });
        Route::get('/daftar-berita', [BeritaController::class, 'daftar_berita'])->name('daftar-berita');
    });

    // PENGADUAN ROUTE
    Route::group(['prefix' => '/pengaduan'], function () {
        Route::get('/', function () {
            return redirect()->route('pembuatan-pengaduan');
        });
        Route::get('/pembuatan-pengaduan', [PengaduanController::class, 'pembuatan_pengaduan'])->name('pembuatan-pengaduan');
        Route::post('/post-pembuatan-pengaduan', [PengaduanController::class, 'post_pembuatan_pengaduan'])->name('post-pembuatan-pengaduan');
        Route::post('/konfirmasi-pengaduan', [PengaduanController::class, 'konfirmasi_pengaduan'])->name('konfirmasi-pengaduan');
    });

    // KRITIK DAN SARAN ROUTE
    Route::group(['prefix' => '/kritik-dan-saran'], function () {
        Route::get('/', function () {
            return redirect()->route('pembuatan-kritiksaran');
        });
        Route::get('/pembuatan-kritiksaran', [KritiksaranController::class, 'pembuatan_kritiksaran'])->name('pembuatan-kritiksaran');
        Route::post('/post-pembuatan-kritiksaran', [KritiksaranController::class, 'post_pembuatan_kritiksaran'])->name('post-pembuatan-kritiksaran');
    });
});
