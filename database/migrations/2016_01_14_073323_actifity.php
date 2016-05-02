<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Actifity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actifity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_actifity', 100)->unique();
            $table->integer('unit_id')->unsigned()->nullable();
            $table->integer('jenis_id')->unsigned()->nullable();
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
        Schema::drop('actifity');
    }
}
