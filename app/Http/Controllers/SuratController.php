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

class SuratController extends Controller
{
    // Fungsi untuk Pembuatan Surat
    public function pembuatan_surat()
    {
        $session_users = session('data_login');
        $users = $session_users;
        switch ($users->login_level) {
            case 'admin':
                $surat = Surat::all();
                return view('surat.pembuatan-surat', [
                    'surat' => $surat,
                ]);
                break;
            case 'user':
                $surat = Surat::where('login_id', $users->id)->get();
                return view('surat.pembuatan-surat', [
                    'surat' => $surat,
                ]);
                break;
        }
    }

    // Fungsi untuk menambah Data Surat
    public function post_pembuatan_surat(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $surat_dokumen = $request->file('surat_dokumen');
        if ($surat_dokumen == null) {
            $randomNamaDokumen = null;
        } else {
            $surat_dokumen = $request->file('surat_dokumen');
            $ext_dokumen = $surat_dokumen->getClientOriginalExtension();
            $getName = $surat_dokumen->getClientOriginalName();
            $explode_text = explode(".", $getName);
            foreach ($explode_text as $value) {
                $value = strtolower($value);
                if ($value == "php" || $value == "png" || $value == "jpg" || $value == "jpeg" || $value == "webp" || $value == "html" || $value == "asp" || $value == "pphp") {
                    return redirect()->route('pembuatan-surat')->with('status', 'Dokumen Extensi selain (.PDF) tidak dapat diupload.')->withInput();
                    break;
                }
            }
            $randomNamaDokumen = Str::random(10) . "." .$ext_dokumen;
            $gambar = $request->file('surat_dokumen')->move(public_path('dokumen-surat'), strtolower($randomNamaDokumen));
        }
        $surat_pengirim = $users->login_nama;
        $surat_isi = "asdasd";
        $surat_jenis = $request->surat_jenis;
        $surat_perihal = $request->surat_perihal;
        $surat_lampiran = $request->surat_lampiran;
        $surat_nomor = $request->surat_nomor;
        $surat_pelampir_pekerjaan = $request->surat_pelampir_pekerjaan;
        $surat_pelampir_statusperkawinan = $request->surat_pelampir_statusperkawinan;
        $surat_pelampir_jenkel = $request->surat_pelampir_jenkel;
        $surat_pelampir_kewarganegaraan = $request->surat_pelampir_kewarganegaraan;
        $surat_pelampir_goldarah = $request->surat_pelampir_goldarah;
        $surat_pelampir_alamat = $request->surat_pelampir_alamat;
        $surat_pelampir_agama = $request->surat_pelampir_agama;
        $surat_pelampir_nama = $users->login_nama;
        $surat_pelampir_tgllahir = $request->surat_pelampir_tgllahir;
        $surat_kode = "5rt0" . strtolower(Str::random(8));
        $surat_status = "diproses";
        $login_id = $users->id;
        $surat = new Surat;
        $save_surat = $surat->create([
            'surat_isi' => $surat_isi,
            'surat_pengirim' => $surat_pengirim,
            'surat_nomor' => $surat_nomor,
            'surat_lampiran' => $surat_lampiran,
            'surat_perihal' => $surat_perihal,
            'surat_jenis' => $surat_jenis,
            'surat_kode' => $surat_kode,
            'surat_status' => $surat_status,
            'surat_tanggal' => now(),
            'surat_pelampir_nama' => $surat_pelampir_nama,
            'surat_pelampir_jenkel' => $surat_pelampir_jenkel,
            'surat_pelampir_tgllahir' => $surat_pelampir_tgllahir,
            'surat_pelampir_statusperkawinan' => $surat_pelampir_statusperkawinan,
            'surat_pelampir_goldarah' => $surat_pelampir_goldarah,
            'surat_pelampir_kewarganegaraan' => $surat_pelampir_kewarganegaraan,
            'surat_pelampir_pekerjaan' => $surat_pelampir_pekerjaan,
            'surat_pelampir_agama' => $surat_pelampir_agama,
            'surat_pelampir_alamat' => $surat_pelampir_alamat,
            'surat_dokumen'  => $randomNamaDokumen,
            'login_id' => $login_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $cek_save_surat = $save_surat->save();
        if ($cek_save_surat == true) {
            return redirect()->route('pembuatan-surat')->with('status', 'Surat telah berhasil dibuat!');
        } else {
            return redirect()->route('pembuatan-surat')->with('status', 'Terjadi kesalahan. Surat tidak dapat dibuat.');
        }
    }

    // Fungsi untuk melakukan konfirmasi status surat
    public function konfirmasi_surat(Request $request)
    {
        $cek_konfirmasi = $request->buttonkonfirmasi;
        $id_surat = $request->id_surat;
        $surat = Surat::find(intval($id_surat));
        switch ($cek_konfirmasi) {
            case 'diterima':
                $update_surat = $surat->update([
                    'surat_status' => "diterima",
                    'updated_at' => now()
                ]);
                if ($update_surat == true) {
                    return redirect()->route('pembuatan-surat')->with('status', 'surat dikonfirmasi dengan status "Diterima".');
                } else {
                    return redirect()->route('pembuatan-surat')->with('status', 'surat telah dibatalkan.');
                }
                break;
            case 'diproses':
                $update_surat = $surat->update([
                    'surat_status' => "DIPROSES",
                    'updated_at' => now()
                ]);
                if ($update_surat == true) {
                    return redirect()->route('pembuatan-surat')->with('status', 'surat dikonfirmasi dengan status "Ditolak".');
                } else {
                    return redirect()->route('pembuatan-surat')->with('status', 'surat telah dibatalkan.');
                }
                break;
        }
    }

    public function hapus_surat(Request $request, $id)
    {
        $surat = Surat::find($id);
        $surat_hapus = $surat->forceDelete();
        if ($surat_hapus == true) {
            return redirect()->route('pembuatan-surat')->with('status', 'Pengaduan telah berhasil dihapus!');
        } else {
            return redirect()->route('pembuatan-surat')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }

    public function lihat_surat($id)
    {
        $surat = Surat::find($id);
        // dd($surat);
        return view('surat.lihat-surat', [
            'surat' => $surat
        ]);
    }
}
