<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
