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
    Dataanggaran,
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
        $anggaran = Anggaran::all();

        return view('keuangan.informasi-keuangan', [
            'users' => $users,
            'anggaran' => $anggaran,
        ]);
    }

    public function lihat_keuangan($id)
    {
        // $anggaran = Anggaran::find($id);
        $anggaran = Anggaran::all();
        $data_anggaran = Dataanggaran::all();
        dd([
            $anggaran,
            $data_anggaran
        ]);
        return view('keuangan.lihat-keuangan', [
            'anggaran' => $anggaran
        ]);
    }

    public function cek_keuangan($id)
    {
        $anggaran = Anggaran::find($id);
        $data_anggaran = Dataanggaran::where('anggaran_id', $anggaran->id)->get();

        return view('keuangan.cek-keuangan', [
            'anggaran' => $anggaran,
            'data_anggaran' => $data_anggaran,
        ]);
    }

    public function hapus_keuangan(Request $request, $id)
    {
        $cari_data_anggaran = Anggaran::find($id);
        $anggaran = Anggaran::where('anggaran_nama', $cari_data_anggaran->anggaran_nama)->get();
        foreach ($anggaran as $take_anggaran) {
            $anggaran_hapus = $take_anggaran->forceDelete();
        }
        if ($anggaran_hapus == true) {
            return redirect()->route('informasi-keuangan')->with('status', 'Data Anggaran telah berhasil dihapus!');
        } else {
            return redirect()->route('informasi-keuangan')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
