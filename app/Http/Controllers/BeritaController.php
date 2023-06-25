<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Pengaduan;
use App\Models\Kritiksaran;
use App\Models\Keuangan;
use App\Models\Surat;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function daftar_berita()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        dd($users);
        $berita = Berita::all();
        return view('berita.daftar-berita', [
            'berita' => $berita
        ]);
    }
}
