<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LampiranDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampiran_dokumen', function (Blueprint $table) {
            $table->integer('dokumen_upload_id')->unsigned()->nullable();
            $table->integer('personil_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lampiran_dokumen');
    }
}
