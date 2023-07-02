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

class KritiksaranController extends Controller
{
    public function pembuatan_kritiksaran()
    {
        $session_users = session('data_login');
        $users = $session_users;
        switch ($users->login_level) {
            case 'admin':
                $kritiksaran = Kritiksaran::all();
                return view('kritiksaran.pembuatan-kritiksaran', [
                    'kritiksaran' => $kritiksaran
                ]);
                break;
            case 'user':
                $kritiksaran = Kritiksaran::where('login_id', $users->id)->get();
                return view('kritiksaran.pembuatan-kritiksaran', [
                    'kritiksaran' => $kritiksaran
                ]);
                break;
        }
    }

    public function post_pembuatan_kritiksaran(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $kritiksaran = new Kritiksaran();
        $kritiksaran_keterangan = $request->kritiksaran_keterangan;
        $kritiksaran_tipe = $request->kritiksaran_tipe;

        $save_kritiksaran = $kritiksaran->create([
            'kritiksaran_keterangan' => $kritiksaran_keterangan,
            'kritiksaran_tipe' => $kritiksaran_tipe,
            'kritiksaran_pengirim' => $users->login_nama,
            'kritiksaran_tanggal' => now(),
            'login_id' => $users->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_kritiksaran->save();
        return redirect()->route('pembuatan-kritiksaran')->with('status', 'Pengaduan telah berhasil dibuat.');
    }

    public function hapus_kritiksaran(Request $request, $id)
    {
        $kritiksaran = Kritiksaran::find($id);
        $kritiksaran_hapus = $kritiksaran->forceDelete();
        if ($kritiksaran_hapus == true) {
            return redirect()->route('pembuatan-kritiksaran')->with('status', 'Data Kritik dan Saran telah berhasil dihapus!');
        } else {
            return redirect()->route('pembuatan-kritiksaran')->with('status', 'Terjadi kesalahan. Data tidak dapat dihapus.');
        }
    }
}
