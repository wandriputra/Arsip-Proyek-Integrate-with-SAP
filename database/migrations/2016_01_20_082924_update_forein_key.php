<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeinKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('personil_id')
                ->references('id')
                ->on('personil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('role_user_id')
                ->references('id')
                ->on('role_user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('personil', function($table) {
            $table->foreign('unit_id')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('jabatan_id')
                ->references('id')
                ->on('jabatan')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('atasan_id')
                ->references('id')
                ->on('personil')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('unit', function($table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('jabatan', function($table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('role_user', function($table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });                

        Schema::table('dokumen', function (Blueprint $table) {
            //
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sub_jenis_id')
                ->references('id')
                ->on('sub_jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('asal_surat')
                ->references('id')
                ->on('personil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tujuan_surat')
                ->references('id')
                ->on('personil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('visibility_id')
                ->references('id')
                ->on('visibility')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('status_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('jenis_dokumen', function (Blueprint $table) {

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('sub_jenis_dokumen', function (Blueprint $table) {
            //
            $table->foreign('induk_jenis_dokumen')
                ->references('id')
                ->on('jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('approval_dokumen', function (Blueprint $table) {
            //
            $table->foreign('dokumen_upload_id')
                ->references('id')
                ->on('dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('personil_id')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('jenis_approval_id')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('jenis_approval', function (Blueprint $table) {
            //
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('tag_dokumen', function (Blueprint $table) {
            //
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('status_dokumen', function (Blueprint $table) {
            //
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('visibility', function (Blueprint $table) {
            //
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('unit_dokumen', function (Blueprint $table) {
            //
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        }); 

        Schema::table('lampiran_dokumen', function (Blueprint $table) {
            //
            $table->foreign('personil_id')
                ->references('id')
                ->on('personil')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dokumen_upload_id')
                ->references('id')
                ->on('dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('dokumen_has_tag', function (Blueprint $table) {
            //
            $table->foreign('tag_id')
                ->references('id')
                ->on('tag_dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dokumen_upload_id')
                ->references('id')
                ->on('dokumen')                
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
        //
    }
}
