<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DokumenSap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_sap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_sap', 25)->nullable();
            $table->integer('dokumen_id')->unsigned()->nullable();
            $table->string('type',2)->nullable();
            $table->timestamps();
        });

        Schema::table('dokumen_sap', function (Blueprint $table) {
            //
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')
                ->onDelete('cascade')
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
        Schema::drop('dokumen_sap');
    }
}
