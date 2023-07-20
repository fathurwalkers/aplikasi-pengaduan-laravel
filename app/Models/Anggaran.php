<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dataanggaran;

class Anggaran extends Model
{
    use HasFactory;
    protected $table = 'anggaran';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function dataanggaran()
    {
        return $this->hasMany(Dataanggaran::class);
    }
}
