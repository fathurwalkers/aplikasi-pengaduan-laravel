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

class PengaduanController extends Controller
{
    public $users;

    public function __construct()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $this->users = $users;
    }

    public function pembuatan_pengaduan()
    {
        return view('pengaduan.pembuatan-pengaduan');
    }

    public function post_pembuatan_pengaduan(Request $request)
    {
        $pengaduan = new Pengaduan;
        $users = $this->users;
        $pengaduan_keterangan = $request->pengaduan_keterangan;
        $pengaduan_jenis = $request->pengaduan_jenis;

        $save_pengaduan = $pengaduan->create([
            'pengaduan_keterangan' => $pengaduan_keterangan,
            'pengaduan_jenis' => $pengaduan_jenis,
            'pengaduan_pengirim' => $users->login_nama,
            'pengaduan_status' => "DITOLAK",
            'pengaduan_tanggal' => now(),
            'login_id' => $users->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_pengaduan->save();
        return redirect()->route('dashboard')->with('status', 'Anda telah berhasil login.');
    }

}
