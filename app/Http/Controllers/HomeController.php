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

class HomeController extends Controller
{
    public function index()
    {
        $session_users = session('data_login');
        if ($session_users == null ) {
            $users = null;
            return view('home.index', [
                'users' => $users
            ]);
        } else {
            $users = Login::find($session_users->id);
            return view('home.index', [
                'users' => $users
            ]);
        }
    }
}
