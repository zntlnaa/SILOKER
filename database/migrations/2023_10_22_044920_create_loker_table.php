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
        Schema::create('loker', function (Blueprint $table) {
            $table->string('idloker')->primary();
            $table->string('idperusahaan');
            $table->string('nama');
            $table->string('tipe');
            $table->string('usia_min');
            $table->string('usia_max');
            $table->string('gaji_min');
            $table->string('gaji_max');
            $table->string('nama_cp');
            $table->string('email_cp');
            $table->string('no_telp_cp');
            $table->date('tgl_update');
            $table->date('tgl_aktif');
            $table->date('tgl_tutup');
            $table->string('status');
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
        Schema::dropIfExists('loker');
    }
};
