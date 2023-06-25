<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengaduan;
use App\Models\Kritiksaran;
use App\Models\Berita;
use App\Models\Surat;

class Login extends Model
{
    use HasFactory;
    protected $table = 'login';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function kritiksaran()
    {
        return $this->hasMany(Kritiksaran::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}
