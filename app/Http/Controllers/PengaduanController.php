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
    public function pembuatan_pengaduan()
    {
        $session_users = session('data_login');
        $users = $session_users;
        switch ($users->login_level) {
            case 'admin':
                $pengaduan = Pengaduan::all();
                return view('pengaduan.pembuatan-pengaduan', [
                    'pengaduan' => $pengaduan,
                ]);
                break;
            case 'user':
                $pengaduan = Pengaduan::where('login_id', $users->id)->get();
                return view('pengaduan.pembuatan-pengaduan', [
                    'pengaduan' => $pengaduan,
                ]);
                break;
        }
    }

    public function post_pembuatan_pengaduan(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $pengaduan = new Pengaduan;
        $pengaduan_keterangan = $request->pengaduan_keterangan;
        $pengaduan_jenis = $request->pengaduan_jenis;

        $save_pengaduan = $pengaduan->create([
            'pengaduan_keterangan' => $pengaduan_keterangan,
            'pengaduan_jenis' => $pengaduan_jenis,
            'pengaduan_pengirim' => $users->login_nama,
            'pengaduan_status' => "PENDING",
            'pengaduan_tanggal' => now(),
            'login_id' => $users->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_pengaduan->save();
        return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan telah berhasil dibuat.');
    }
}
