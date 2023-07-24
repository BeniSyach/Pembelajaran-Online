<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sesi', function (Blueprint $table) {
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
        Schema::table('sesi', function (Blueprint $table) {
            //
        });
    }
}
