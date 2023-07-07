<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Carbon\Carbon;
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

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil session user yang sedang login
        $session_users = session('data_login');

        // Jika session tidak ada (atau NULL) maka variabel $users bernilai null, dan akan langsung mengarah kehalaman index Home
        if ($session_users == null ) {
            $users = null;
            return view('home.index', [
                'users' => $users,
            ]);
        // Jika session ada (tidak bernilai NULL) maka variabel $users berisi session user, dan akan langsung mengarah kehalaman index Home
        } else {
            $users = Login::find($session_users->id);
            return view('home.index', [
                'users' => $users,
            ]);
        }
    }
}
