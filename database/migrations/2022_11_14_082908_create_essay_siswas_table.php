<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEssaySiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('essay_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_ujian_id');
            $table->string('kode');
            $table->integer('siswa_id');
            $table->longText('jawaban')->nullable();
            $table->boolean('ragu')->nullable();
            $table->integer('nilai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('essay_siswas');
    }
}
