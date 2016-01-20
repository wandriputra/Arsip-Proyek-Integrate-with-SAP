<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApprovalDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_dokumen', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('tanggal_approval');
            $table->string('status', 10);
            $table->integer('dokumen_upload_id')->unsigned()->nullable();
            $table->integer('personil_id')->unsigned()->nullable();
            $table->integer('jenis_approval_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('approval_dokumen');
    }
}
