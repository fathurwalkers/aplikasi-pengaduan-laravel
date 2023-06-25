<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();

            $table->string('surat_pengirim')->nullable();
            $table->string('surat_jenis')->nullable();
            $table->string('surat_kode')->nullable();
            $table->string('surat_status')->nullable();
            $table->dateTime('surat_tanggal')->nullable();
            $table->string('surat_dokumen')->nullable();

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat');
    }
};
