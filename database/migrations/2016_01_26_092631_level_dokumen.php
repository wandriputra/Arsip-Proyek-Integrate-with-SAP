<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LevelDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_dokumen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_level');
            $table->timestamps();
        });

        Schema::create('level_sub_dokumen', function (Blueprint $table) {
            $table->integer('level_id')->unsigned()->nullable();
            $table->integer('sub_jenis_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('level_dokumen');
    }
}
