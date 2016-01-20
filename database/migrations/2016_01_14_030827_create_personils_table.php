<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('nama_personil');
            $table->string('singkatan', 5)->nullable();
            $table->string('email', 200)->nullable();
            $table->integer('unit_id')->unsigned()->nullable();
            $table->integer('jabatan_id')->unsigned()->nullable();
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
        Schema::drop('personil');
    }
}
