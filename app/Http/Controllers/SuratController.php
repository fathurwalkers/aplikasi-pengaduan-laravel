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

class SuratController extends Controller
{
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

    public function post_pembuatan_surat(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);

        $surat = new Surat;

        $surat_pengirim = $users->login_nama;
        $surat_jenis = $request->surat_jenis;
        $surat_kode = "5rt0" . strtolower(Str::random(8));
        $surat_status = "diproses";
        // $surat_tanggal = $request->surat_tanggal;
        $login_id = $users->id;

        $save_surat = $surat->create([
            'surat_pengirim' => $surat_pengirim,
            'surat_jenis' => $surat_jenis,
            'surat_kode' => $surat_kode,
            'surat_status' => $surat_status,
            'surat_tanggal' => now(),
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
}
