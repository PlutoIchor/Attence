<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_kelas')->references('id')->on('ruang_kelas');
            $table->integer('NIS');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->integer('nomor_absen');
            $table->string('email');
            $table->string('no_telp');
            $table->string('jk');
            $table->string('password');
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
        Schema::dropIfExists('siswas');
    }
}
