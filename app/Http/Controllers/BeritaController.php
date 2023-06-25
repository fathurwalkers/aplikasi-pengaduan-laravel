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
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function daftar_berita()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        if ($users->login_level == 'admin') {
            $berita = Berita::all();
            return view('berita.daftar-berita', [
                'berita' => $berita
            ]);
        } else {
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak dapat mengakses Halaman yang dituju.');
        }
    }

    public function hapus_berita(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita_hapus = $berita->forceDelete();
        if ($berita_hapus == true) {
            return redirect()->route('daftar-berita')->with('status', 'Berita telah berhasil dihapus!');
        } else {
            return redirect()->route('daftar-berita')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }

    public function update_berita(Request $request, $id)
    {
        $berita = Berita::find($id);
        $berita_judul = $request->berita_judul;
        $berita_isi = $request->berita_isi;
        $berita_jenis = $request->berita_jenis;
        $berita_tanggal = $request->berita_tanggal;
        $update_berita = $berita->update([
            'berita_judul' => $berita_judul,
            'berita_isi' => $berita_isi,
            'berita_jenis' => $berita_jenis,
            'berita_tanggal' => $berita_tanggal,
            'updated_at' => now()
        ]);
        if ($update_berita == true) {
            return redirect()->route('daftar-berita')->with('status', 'Informasi telah berhasil diubah!');
        } else {
            return redirect()->route('daftar-berita')->with('status', 'Terjadi kesalahan. Informasi tidak dapat diubah.');
        }
    }

    public function post_berita(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $berita_judul = $request->berita_judul;
        $berita_isi = $request->berita_isi;
        $berita_jenis = $request->berita_jenis;
        $berita_tanggal = $request->berita_tanggal;
        $berita_kode = "1nf0" . strtolower(Str::random(10));
        $berita = new Berita;
        $save_berita = $berita->create([
            'berita_judul' => $berita_judul,
            'berita_isi' => $berita_isi,
            'berita_jenis' => $berita_jenis,
            'berita_tanggal' => $berita_tanggal,
            'berita_kode' => $berita_kode,
            'login_id' => $users->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $cek_save_berita = $save_berita->save();
        if ($cek_save_berita == true) {
            return redirect()->route('daftar-berita')->with('status', 'Informasi baru telah berhasil ditambahkan!');
        } else {
            return redirect()->route('daftar-berita')->with('status', 'Terjadi kesalahan. Informasi tidak dapat ditambahkan.');
        }
    }
}
