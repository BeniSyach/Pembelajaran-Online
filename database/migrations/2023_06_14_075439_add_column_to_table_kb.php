<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTableKb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelompok_belajar', function (Blueprint $table) {
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->foreign('id_guru')->references('id')->on('guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelompok_belajar', function (Blueprint $table) {
            //
        });
    }
}
