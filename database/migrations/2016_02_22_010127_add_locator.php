<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->string('locator')->nullable();
            $table->integer('status_dokumen_id')->unsigned();
        });

        Schema::table('dokumen', function (Blueprint $table) {
            //
            $table->foreign('status_dokumen_id')
                ->references('id')
                ->on('status_dokumen')
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
        Schema::table('dokumen', function (Blueprint $table) {
            //
        });
    }
}
