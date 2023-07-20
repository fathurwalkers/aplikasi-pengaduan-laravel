<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggaran;

class Dataanggaran extends Model
{
    use HasFactory;
    protected $table = 'data_anggaran';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class);
    }
}
