<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('personil_id')
                ->references('id')
                ->on('personil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('personil', function($table) {
            $table->foreign('posisi_id')
                ->references('id')
                ->on('posisi')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unit_id')
                ->references('id')
                ->on('unit')                
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('unit', function($table) {
             $table->foreign('created_by')
                ->references('id')
                ->on('user')
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
        //
    }
}
