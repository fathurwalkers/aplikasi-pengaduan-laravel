<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_anggaran', function (Blueprint $table) {
            $table->id();

            $table->string('data_anggaran_deskripsi')->nullable();
            $table->integer('data_anggaran_debet')->nullable();
            $table->integer('data_anggaran_kredit')->nullable();
            $table->date('data_anggaran_tanggal')->nullable();

            $table->unsignedBigInteger('anggaran_id')->nullable()->default(null);
            $table->foreign('anggaran_id')->references('id')->on('anggaran')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_anggaran');
    }
};
