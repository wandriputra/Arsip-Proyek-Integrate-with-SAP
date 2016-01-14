<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SapTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_sap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po');
            $table->string('kpp');
            $table->string('wbs');
            $table->string('ir');
            $table->string('gr');
            $table->string('sa');
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
        Schema::drop('tabel_sap');
    }
}
