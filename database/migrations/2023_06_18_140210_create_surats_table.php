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

            $table->longText('surat_isi')->nullable();
            $table->string('surat_pengirim')->nullable();
            $table->string('surat_nomor')->nullable();
            $table->string('surat_lampiran')->nullable();
            $table->string('surat_perihal')->nullable();
            $table->string('surat_jenis')->nullable();
            $table->string('surat_kode')->nullable();
            $table->string('surat_status')->nullable();
            $table->date('surat_tanggal')->nullable();

            $table->string('surat_pelampir_nama')->nullable();
            $table->string('surat_pelampir_jenkel')->nullable();
            $table->date('surat_pelampir_tgllahir')->nullable();
            $table->string('surat_pelampir_statusperkawinan')->nullable();
            $table->string('surat_pelampir_goldarah')->nullable();
            $table->string('surat_pelampir_kewarganegaraan')->nullable();
            $table->string('surat_pelampir_pekerjaan')->nullable();
            $table->string('surat_pelampir_agama')->nullable();
            $table->string('surat_pelampir_alamat')->nullable();
            $table->string('surat_dokumen')->nullable(); // Dokumen Pendukung Pelampir Surat

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
