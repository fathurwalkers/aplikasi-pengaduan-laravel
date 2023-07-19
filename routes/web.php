<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackController,
    BeritaController,
    KeuanganController,
    KritiksaranController,
    PengaduanController,
    SuratController,
    HomeController
};

// Route untuk Halaman Login
Route::get('/login', [BackController::class, 'login'])->name('login');
// Route untuk Proses permintaan Login ke Dashboard
Route::post('/login/proses-login', [BackController::class, 'postlogin'])->name('post-login');

// Route untuk Halaman Register
Route::get('/register', [BackController::class, 'register'])->name('register');
// Route untuk Proses pembuatan Akun Baru (Register)
Route::post('/login/proses-register', [BackController::class, 'postregister'])->name('post-register');

// Route untuk Keluar dari sesi Halaman Dashboard dan Kembali ke Halaman Login
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

// Route Group untuk HomeController (Halaman Depan Aplikasi)
Route::group(['prefix' => '/home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/informasi/{id}', [HomeController::class, 'lihat_informasi'])->name('lihat-informasi');
});

// Route untuk Halaman Dashboard Aplikasi
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
        Route::get('/lihat-surat/{id}', [SuratController::class, 'lihat_surat'])->name('lihat-surat');
        Route::post('/post-pembuatan-surat', [SuratController::class, 'post_pembuatan_surat'])->name('post-pembuatan-surat');
        Route::post('/konfirmasi-surat', [SuratController::class, 'konfirmasi_surat'])->name('konfirmasi-surat');
        Route::post('/hapus-surat/{id}', [SuratController::class, 'hapus_surat'])->name('hapus-surat');
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

    Route::group(['prefix' => '/keuangan'], function () {
        Route::get('/', fn () => redirect()->route('informasi-keuangan'));
        Route::get('/informasi-keuangan', [KeuanganController::class, 'informasi_keuangan'])->name('informasi-keuangan');
    });
});

// Route Default ketika aplikasi Pertama Kali di Akses akan langsung diarahkan ke Halaman /home
Route::get('/', function() {
    return redirect()->route('home');
});
