<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubJenisDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_jenis_dokumen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sub',80);
            $table->string('singkatan',10)->nullable();
            $table->integer('actifity_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::drop('sub_jenis_dokumen');
    }
}
