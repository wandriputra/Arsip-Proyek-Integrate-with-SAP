<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJraDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jra_dokumens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',20);
            $table->string('jenis_arsip');
            $table->string('waktu_aktif');
            $table->string('waktu_inaktif');
            $table->string('keterangan');
            $table->char('level');
            $table->integer('kode_induk')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('jra_dokumens', function (Blueprint $table) {
            $table->foreign('kode_induk')
                ->references('id')
                ->on('jra_dokumens')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jra_dokumens');
    }
}
