<?php

use Illuminate\Database\Seeder;

class insert_level_dokumen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('level_dokumen')->delete();

    	$level = [
                    array('id' => 1, 'nama_level' => 'User Unit Sebelum Pengadaan'),
                    array('id' => 2, 'nama_level' => 'User Unit Sesudah Pengadaan'),
                    array('id' => 3, 'nama_level' => 'Procurement'),
                    array('id' => 4, 'nama_level' => 'Logistic & Warehouse'),
                    array('id' => 5, 'nama_level' => 'Accounting'),];

     	DB::table('level_dokumen')->insert($level);
    }
}
