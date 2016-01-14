<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumensTable extends Migration
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
            $table->string('nomer', 200)->unique();
            $table->string('nama', 255);
            $table->integer('jenis_id')->unsigned(); //jenis_dokumen_id
            $table->integer('asal_surat')->unsigned(); //unit_id
            $table->integer('tujuan_surat')->unsigned(); //unit_id
            $table->string('sap_po',50); //sap_po
            $table->string('sap_kpp',50); //sap_kpp
            $table->integer('tembusan_surat_1')->unsigned(); //unit_id
            $table->integer('tembusan_surat_2')->unsigned(); //unit_id
            $table->integer('tembusan_surat_3')->unsigned(); //unit_id
            $table->integer('created_by')->unsigned(); //user_id
            $table->string('status',30);
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
