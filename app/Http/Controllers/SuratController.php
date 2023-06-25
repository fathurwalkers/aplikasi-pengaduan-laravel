<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

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
        $surat = new Surat;
        die;
    }

    public function konfirmasi_surat(Request $request)
    {
        $cek_konfirmasi = $request->buttonkonfirmasi;
        $id_surat = $request->id_surat;
        $surat = Surat::find(intval($id_surat));
        switch ($cek_konfirmasi) {
            case 'diterima':
                $update_surat = $surat->update([
                    'surat_status' => "DITERIMA",
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
