<?php

use Illuminate\Database\Seeder;

class insert_module extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('module_app')->delete();

        $array = [
            ['id'=>'1', 'nama_module'=>'verify_dokumen', 'description'=>'module ferifikasi dokumen'],
            ['id'=>'2', 'nama_module'=>'delete_dokumen', 'description'=>'module delete dokumen'],
            ['id'=>'3', 'nama_module'=>'revisi_dokumen', 'description'=>'module delete dokumen'],
            ['id'=>'4', 'nama_module'=>'upload_admin', 'description'=>'module delete dokumen'],
            ['id'=>'5', 'nama_module'=>'upload_user', 'description'=>'module delete dokumen'],
            ['id'=>'6', 'nama_module'=>'upload_procurement', 'description'=>'module delete dokumen'],
            ['id'=>'7', 'nama_module'=>'upload_logistik', 'description'=>'module delete dokumen'],
            ['id'=>'8', 'nama_module'=>'upload_warehouse', 'description'=>'module delete dokumen'],
            ['id'=>'9', 'nama_module'=>'upload_accounting', 'description'=>'module delete dokumen'],
            ['id'=>'10', 'nama_module'=>'upload_file_sap', 'description'=>'module delete dokumen'],
        ];


        DB::table('module_app')->insert($array);

    }
}
