<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();

            $table->longText('pengaduan_keterangan')->nullable();
            $table->string('pengaduan_jenis')->nullable();
            $table->string('pengaduan_pengirim')->nullable();
            $table->string('pengaduan_status')->nullable();
            $table->dateTime('pengaduan_tanggal')->nullable();

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
};
