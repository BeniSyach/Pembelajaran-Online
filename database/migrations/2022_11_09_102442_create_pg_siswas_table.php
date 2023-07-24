<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePgSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pg_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_ujian_id');
            $table->string('kode');
            $table->integer('siswa_id');
            $table->string('jawaban')->nullable();
            $table->boolean('benar')->nullable();
            $table->boolean('ragu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pg_siswa');
    }
}
