<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KritiksaranController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SuratController;

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
        Route::get('/', fn () => redirect()->route('daftar-berita'));
        Route::get('/daftar-berita', [BeritaController::class, 'daftar_berita'])->name('daftar-berita');
        Route::post('/post-berita', [BeritaController::class, 'post_berita'])->name('post-berita');
        Route::post('/hapus-berita/{id}', [BeritaController::class, 'hapus_berita'])->name('hapus-berita');
        Route::post('/update-berita/{id}', [BeritaController::class, 'update_berita'])->name('update-berita');
    });

    // SURAT ROUTE
    Route::group(['prefix' => '/surat'], function () {
        Route::get('/', fn () => redirect()->route('pembuatan-surat'));
        Route::get('/pembuatan-surat', [SuratController::class, 'pembuatan_surat'])->name('pembuatan-surat');
        Route::post('/post-pembuatan-surat', [SuratController::class, 'post_pembuatan_surat'])->name('post-pembuatan-surat');
        Route::post('/konfirmasi-surat', [SuratController::class, 'konfirmasi_surat'])->name('konfirmasi-surat');
    });

    // PENGADUAN ROUTE
    Route::group(['prefix' => '/pengaduan'], function () {
        Route::get('/', fn () => redirect()->route('pembuatan-pengaduan'));
        Route::get('/pembuatan-pengaduan', [PengaduanController::class, 'pembuatan_pengaduan'])->name('pembuatan-pengaduan');
        Route::post('/post-pembuatan-pengaduan', [PengaduanController::class, 'post_pembuatan_pengaduan'])->name('post-pembuatan-pengaduan');
        Route::post('/konfirmasi-pengaduan', [PengaduanController::class, 'konfirmasi_pengaduan'])->name('konfirmasi-pengaduan');
        Route::post('/hapus-pengaduan/{id}', [PengaduanController::class, 'hapus_pengaduan'])->name('hapus-pengaduan');
    });

    // KRITIK DAN SARAN ROUTE
    Route::group(['prefix' => '/kritik-dan-saran'], function () {
        Route::get('/', fn () => redirect()->route('pembuatan-kritiksaran'));
        Route::get('/pembuatan-kritiksaran', [KritiksaranController::class, 'pembuatan_kritiksaran'])->name('pembuatan-kritiksaran');
        Route::post('/post-pembuatan-kritiksaran', [KritiksaranController::class, 'post_pembuatan_kritiksaran'])->name('post-pembuatan-kritiksaran');
        Route::post('/hapus-kritiksaran/{id}', [KritiksaranController::class, 'hapus_kritiksaran'])->name('hapus-kritiksaran');
    });
});
