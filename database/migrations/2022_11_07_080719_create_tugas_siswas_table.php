<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('siswa_id');
            $table->longText('teks')->nullable();
            $table->string('file')->nullable();
            $table->string('date_send')->nullable();
            $table->boolean('is_telat')->nullable();
            $table->integer('nilai')->nullable();
            $table->longText('catatan_guru')->nullable();
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
        Schema::dropIfExists('tugas_siswas');
    }
}
