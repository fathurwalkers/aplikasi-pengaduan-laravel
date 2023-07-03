<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\{Hash, Arr, Str};
use App\Models\{Login, Pengaduan, Kritiksaran, Keuangan, Surat, Berita};
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $main_title = "Informasi & Berita";
        $session_users = session('data_login');
        if ($session_users == null ) {
            $users = null;
            return view('home.index', [
                'users' => $users,
                'main_title' => $main_title,
            ]);
        } else {
            $users = Login::find($session_users->id);
            return view('home.index', [
                'users' => $users,
                'main_title' => $main_title,
            ]);
        }
    }
}
