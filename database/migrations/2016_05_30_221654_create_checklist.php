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
        Schema::create('checklist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_checklist'); //TODO: unique with unit_id
            $table->integer('unit_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('checklist', function (Blueprint $table) {
           $table->foreign('unit_id')
               ->references('id')
               ->on('unit')
               ->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onUpdate('cascade');
        });

        Schema::create('checklist_has_activity_jenis', function (Blueprint $table){
            $table->integer('checklist_id')->unsigned()->nullable();
            $table->integer('actifity_id')->unsigned()->nullable();
            $table->integer('sub_jenis_id')->unsigned()->nullable();
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

        Schema::create('checklist_has_dokumen', function(Blueprint $table){
            $table->integer('checklist_id')->unsigned()->nullable();
            $table->integer('dokumen_id')->unsigned()->nullable();
        });

        Schema::table('checklist_has_dokumen', function(Blueprint $table){
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onUpdate('cascade');
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')
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
