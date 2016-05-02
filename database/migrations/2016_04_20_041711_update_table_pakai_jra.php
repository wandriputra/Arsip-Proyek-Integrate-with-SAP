<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePakaiJra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->integer('jra_dokumen_id')->unsigned();
        });

        Schema::table('dokumen', function (Blueprint $table) {
            //
            $table->foreign('jra_dokumen_id')
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
        Schema::table('dokumen', function (Blueprint $table) {
            //
        });
    }
}
