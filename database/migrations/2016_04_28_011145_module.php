<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Module extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_app', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_module');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('role_user_has_module', function (Blueprint $table) {
            $table->integer('role_user_id')->unsigned()->nullable();
            $table->integer('module_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
        });

        Schema::table('role_user_has_module', function (Blueprint $table) {
            $table->foreign('role_user_id')
                ->references('id')
                ->on('role_user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onUpdate('cascade');
            $table->foreign('module_id')
                ->references('id')
                ->on('module_app')
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
        Schema::drop('module_app');
    }
}
