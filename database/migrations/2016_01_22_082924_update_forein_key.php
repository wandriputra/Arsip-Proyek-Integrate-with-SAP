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

            $table->foreign('unit_atasan')
                ->references('id')
                ->on('unit')
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
            $table->foreign('sub_jenis_id')
                ->references('id')
                ->on('sub_jenis_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unit_asal')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unit_tujuan')
                ->references('id')
                ->on('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('visibility_id')
                ->references('id')
                ->on('visibility')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('status_dokumen_id')
                ->references('id')
                ->on('status_dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('jra_dokumen_id')
                ->references('id')
                ->on('jra_dokumens')
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
            $table->foreign('actifity_id')
                ->references('id')
                ->on('actifity')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('approval_dokumen', function (Blueprint $table) {
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
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('tag_dokumen', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('status_dokumen', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('visibility', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        });

        Schema::table('unit_dokumen', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')                
                ->onDelete('cascade')
                ->onUpdate('cascade');                
        }); 

        Schema::table('tembusan_dokumen', function (Blueprint $table) {
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('unit_id')
                ->references('id')
                ->on('unit')                
                ->onDelete('cascade')
                ->onUpdate('cascade');               
        });

        Schema::table('dokumen_has_tag', function (Blueprint $table) {
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

        Schema::table('folder', function (Blueprint $table) {
            $table->foreign('folder_induk')
                ->references('id')
                ->on('folder')                
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
            $table->foreign('jenis_dokumen_id')
                ->references('id')
                ->on('jenis_dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');               
        });

        Schema::table('share_folders', function (Blueprint $table) {
            $table->foreign('folder_id')
                ->references('id')
                ->on('folder')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('unit_id')
                ->references('id')
                ->on('unit')                
                ->onDelete('cascade')
                ->onUpdate('cascade');              
        });

        Schema::table('folder_dokumen', function (Blueprint $table) {
            $table->foreign('folder_id')
                ->references('id')
                ->on('folder')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');              
        });

        Schema::table('actifity', function (Blueprint $table) {
            $table->foreign('unit_id')
                ->references('id')
                ->on('unit')                
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis_dokumen')                
                ->onDelete('cascade')
                ->onUpdate('cascade');              
        });

        Schema::table('dokumen_sap', function (Blueprint $table) {
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
        }); 



        Schema::table('jra_dokumens', function (Blueprint $table) {
            $table->foreign('kode_induk')
                ->references('id')
                ->on('jra_dokumens')
                ->onUpdate('cascade');
        });

        Schema::table('sap_log', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onUpdate('cascade');
        });

        Schema::table('role_user_has_module', function (Blueprint $table) {
            $table->foreign('role_user_id')
                ->references('id')
                ->on('role_user')
                ->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')
                ->on('user')
                ->onUpdate('cascade');
            $table->foreign('module_id')
                ->references('id')
                ->on('module_app')
                ->onUpdate('cascade');
        });

        Schema::table('checklist', function (Blueprint $table) {
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

        

        Schema::table('checklist_has_dokumen', function(Blueprint $table){
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklist')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('dokumen_id')
                ->references('id')
                ->on('dokumen')
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
