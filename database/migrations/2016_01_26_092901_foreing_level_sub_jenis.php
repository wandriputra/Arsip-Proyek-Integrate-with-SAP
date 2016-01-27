<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeingLevelSubJenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('level_sub_dokumen', function (Blueprint $table) {
            //
             $table->foreign('level_id')
                ->references('id')
                ->on('level_dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sub_jenis_id')
                ->references('id')
                ->on('sub_jenis_dokumen')
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
        Schema::table('level_sub_jenis', function (Blueprint $table) {
            //
        });
    }
}
