<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
