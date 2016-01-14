<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeinKeyUploadRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upload_role', function (Blueprint $table) {
            //
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis_dokumen')
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upload_role', function (Blueprint $table) {
            //
        });
    }
}
