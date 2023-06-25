<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
