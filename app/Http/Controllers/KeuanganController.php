<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\{
    Str,
    Arr
};
use App\Models\{
    Anggaran,
    Login,
    Pengaduan,
    Kritiksaran,
    Keuangan,
    Surat,
    Berita
};

class KeuanganController extends Controller
{
    public function informasi_keuangan()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        dd($users);
        return view('keuangan.informasi-keuangan', [
            'users' => $users
        ]);
    }

    public function lihat_keuangan()
    {
        $anggaran = Anggaran::find($id);
    }
}
