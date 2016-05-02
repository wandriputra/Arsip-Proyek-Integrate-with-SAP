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
            ['id'=>'2', 'nama_module'=>'delete_dokumen', 'description'=>'module delete dokumen']];

        DB::table('module_app')->insert($array);

    }
}
