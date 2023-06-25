<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kritiksaran', function (Blueprint $table) {
            $table->id();

            $table->longText('kritiksaran_keterangan')->nullable();
            $table->string('kritiksaran_tipe')->nullable();
            $table->string('kritiksaran_pengirim')->nullable();
            $table->datetime('kritiksaran_tanggal')->nullable();

            $table->unsignedBigInteger('login_id')->nullable()->default(null);
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kritiksaran');
    }
};
