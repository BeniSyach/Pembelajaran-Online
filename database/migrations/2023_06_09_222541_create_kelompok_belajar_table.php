<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokBelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_belajar', function (Blueprint $table) {
            $table->increments('id_kelompok');
            $table->string('nama_kelompok');
            $table->bigInteger('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('kelompok_belajar_siswa', function (Blueprint $table) {
            $table->unsignedInteger('id_kelompok');
            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompok_belajar')->onDelete('cascade');
            $table->string('nis_siswa');
            $table->foreign('nis_siswa')->references('nis')->on('siswa')->onDelete('cascade');
            $table->primary(['id_kelompok', 'nis_siswa']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok_belajar');
    }
}
