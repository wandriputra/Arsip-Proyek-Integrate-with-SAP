<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSapLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sap_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',50);
            $table->string('jumlah_row');
            $table->char('status',2);
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('sap_log', function (Blueprint $table) {
            //
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
        Schema::drop('sap_log');
    }
}
