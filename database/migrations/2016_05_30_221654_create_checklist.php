<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::table('checklist', function (Blueprint $table) {
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



        Schema::table('checklist_has_activity_jenis', function(Blueprint $table){
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('actifity_id')
                ->references('id')
                ->on('actifity')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('sub_jenis_id')
                ->references('id')
                ->on('sub_jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        

        Schema::table('checklist_has_dokumen', function(Blueprint $table){
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::drop('checklist');
        Schema::drop('checklist_has_activity_jenis');
    }
}
