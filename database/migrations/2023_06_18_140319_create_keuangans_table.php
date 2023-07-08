<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();

            $table->string('kas_kategori')->nullable();
            $table->string('kas_uraian')->nullable();
            $table->integer('kas_debet')->nullable();
            $table->integer('kas_kredit')->nullable();
            $table->integer('kas_tipe')->nullable(); // PENERIMAAN / PENGELUARAN

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keuangan');
    }
};
