<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\{
    Str,
    Arr
};
use App\Models\{
    Login,
    Pengaduan,
    Kritiksaran,
    Keuangan,
    Surat,
    Berita
};

class PengaduanController extends Controller
{
    // Fungsi untuk Pembuatan Pengaduan
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

    // Fungsi untuk menambah Data Pengaduan
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

    // Fungsi untuk Melakukan konfirmasi pada status pengaduan
    public function konfirmasi_pengaduan(Request $request)
    {
        $cek_konfirmasi = $request->buttonkonfirmasi;
        $id_pengaduan = $request->id_pengaduan;
        $pengaduan = Pengaduan::find(intval($id_pengaduan));
        switch ($cek_konfirmasi) {
            case 'diterima':
                $update_pengaduan = $pengaduan->update([
                    'pengaduan_status' => "DITERIMA",
                    'updated_at' => now()
                ]);
                if ($update_pengaduan == true) {
                    return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan dikonfirmasi dengan status "Diterima".');
                } else {
                    return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan telah dibatalkan.');
                }
                break;
            case 'ditolak':
                $update_pengaduan = $pengaduan->update([
                    'pengaduan_status' => "DITOLAK",
                    'updated_at' => now()
                ]);
                if ($update_pengaduan == true) {
                    return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan dikonfirmasi dengan status "Ditolak".');
                } else {
                    return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan telah dibatalkan.');
                }
                break;
        }
    }

    // Fungsi untuk menghapus data pengaduan
    public function hapus_pengaduan(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan_hapus = $pengaduan->forceDelete();
        if ($pengaduan_hapus == true) {
            return redirect()->route('pembuatan-pengaduan')->with('status', 'Pengaduan telah berhasil dihapus!');
        } else {
            return redirect()->route('pembuatan-pengaduan')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
