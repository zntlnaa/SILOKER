<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencaker', function (Blueprint $table) {
            $table->id();
            $table->string('noktp')->unique();
            $table->string('nama');
            $table->string('password');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('kota');
            $table->string('email');
            $table->string('no_telp');
            $table->string('foto');
            $table->string('tgl_daftar');
            $table->string('file_ktp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencaker');
    }
};
