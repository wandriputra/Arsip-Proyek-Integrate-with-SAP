<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeinKeyDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            //
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('asal_surat')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tujuan_surat')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tembusan_surat_1')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tembusan_surat_2')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tembusan_surat_3')
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
        Schema::table('dokumen', function (Blueprint $table) {
            //
        });
    }
}
