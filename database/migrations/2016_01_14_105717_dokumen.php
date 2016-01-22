<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class dokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_dokumen')->unique();
            $table->string('nama_dokumen');
            $table->string('file_name_pdf');
            $table->string('lokasi_file_pdf');
            $table->string('tag_keterangan');
            $table->integer('jenis_id')->unsigned(); //jenis_dokumen_id
            $table->integer('sub_jenis_id')->unsigned(); //jenis_dokumen_id
            $table->integer('asal_surat')->unsigned(); //personil
            $table->integer('tujuan_surat')->unsigned(); //personil
            $table->integer('visibility_id')->unsigned(); //personil
            $table->integer('status_id')->unsigned(); //status surat masih ada atau tidak
            $table->integer('created_by')->unsigned(); //user_id
            $table->softDeletes();
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
        Schema::drop('dokumens');
    }
}
