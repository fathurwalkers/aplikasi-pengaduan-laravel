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
        $anggaran = Anggaran::find($id);
        $data_anggaran = Dataanggaran::where('anggaran_id', $anggaran->id)->get();
        return view('keuangan.lihat-keuangan', [
            'anggaran' => $anggaran,
            'data_anggaran' => $data_anggaran,
        ]);
    }

    public function tambah_keuangan(Request $request)
    {
        $anggaran_nama = $request->anggaran_nama;
        $array_tipe_anggaran = ["PENERIMAAN", "PENGELUARAN"];
        foreach ($array_tipe_anggaran as $value) {
            $anggaran = new Anggaran;
            $save_anggaran = $anggaran->create([
                'anggaran_nama' => $anggaran_nama,
                'anggaran_tipe' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_anggaran->save();
        }
        return redirect()->route('informasi-keuangan')->with('status', 'Data Anggaran baru telah berhasil ditambahkan.');
    }

    public function tambah_data_keuangan(Request $request, $id)
    {
        $anggaran = Anggaran::find($id);
        $data_anggaran_deskripsi = $request->data_anggaran_deskripsi;
        $data_anggaran_debet = $request->data_anggaran_debet;
        $data_anggaran_kredit = $request->data_anggaran_kredit;
        $data_anggaran_tanggal = $request->data_anggaran_tanggal;
        $data_anggaran = new Dataanggaran;
        $save_data_anggaran = $data_anggaran->create([
            'data_anggaran_deskripsi' => $data_anggaran_deskripsi,
            'data_anggaran_debet' => intval($data_anggaran_debet),
            'data_anggaran_kredit' => intval($data_anggaran_kredit),
            'data_anggaran_tanggal' => $data_anggaran_tanggal,
            'anggaran_id' => $anggaran->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_data_anggaran->save();
        return redirect()->route('cek-keuangan', $anggaran->id)->with('status', 'Data Anggaran baru telah berhasil ditambahkan.');
    }

    public function ubah_keuangan(Request $request, $id)
    {
        $anggaran_nama = $request->anggaran_nama;
        $anggaran_id = Anggaran::find($id);
        $anggaran = Anggaran::where('anggaran_nama', $anggaran_id->anggaran_nama)->get();
        $anggaran_nama_lama = $anggaran_id->anggaran_nama;
        $anggaran_nama_baru = $request->anggaran_nama;
        foreach ($anggaran as $hehehe) {
            $update_anggaran = $hehehe->update([
                'anggaran_nama' => $anggaran_nama,
                'updated_at' => now()
            ]);
        }
        $alert = "Data Anggaran". $anggaran_nama_lama . " telah berhasil diubah ke " . $anggaran_nama_baru .".";
        return redirect()->route('informasi-keuangan')->with('status', $alert);
    }

    public function ubah_data_keuangan(Request $request, $id)
    {
        $data_anggaran_deskripsi = $request->data_anggaran_deskripsi;
        $data_anggaran_tanggal = $request->data_anggaran_tanggal;
        $anggaran_tipe = $request->anggaran_tipe;
        switch ($anggaran) {
            case 'PENERIMAAN':
                $data_anggaran_debet = $request->data_anggaran_debet;
                $data_anggaran_kredit = NULL;
                break;
            case 'PENGELUARAN':
                $data_anggaran_debet = NULL;
                $data_anggaran_kredit = $request->data_anggaran_kredit;
                break;
        }
        $data_anggaran = Dataanggaran::find($id);
        $update_data_anggaran = $data_anggaran->update([
            'data_anggaran_deskripsi' => $data_anggaran_deskripsi,
            'data_anggaran_debet' => intval($data_anggaran_debet),
            'data_anggaran_kredit' => intval($data_anggaran_kredit),
            'data_anggaran_tanggal' => $data_anggaran_tanggal,
            'updated_at' => now()
        ]);
        $alert = "Data Anggaran telah berhasil diubah.";
        return redirect()->route('cek-keuangan', $anggaran->id)->with('status', 'Data Anggaran baru telah berhasil ditambahkan.');
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

    public function hapus_data_keuangan(Request $request, $id)
    {
        $anggaran = Dataanggaran::find($id);
        $id_anggaran = $anggaran->anggaran_id;
        $anggaran_hapus = $anggaran->forceDelete();
        if ($anggaran_hapus == true) {
            return redirect()->route('cek-keuangan', $id_anggaran)->with('status', 'Data Anggaran telah berhasil dihapus!');
        } else {
            return redirect()->route('cek-keuangan', $id_anggaran)->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
