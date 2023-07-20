<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();

            $table->string('anggaran_nama')->nullable();
            $table->string('anggaran_deskripsi')->nullable();
            $table->string('anggaran_keterangan')->nullable();
            $table->integer('anggaran_debet')->nullable();
            $table->integer('anggaran_kredit')->nullable();
            $table->date('anggaran_tanggal')->nullable();
            $table->string('anggaran_tipe')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggaran');
    }
};
