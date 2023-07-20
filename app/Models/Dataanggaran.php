<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataanggaran extends Model
{
    use HasFactory;
    protected $table = 'data_anggaran';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function anggaran()
    {
        return $this->hasMany(Anggaran::class);
    }
}
