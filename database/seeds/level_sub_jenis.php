<?php

use Illuminate\Database\Seeder;

class level_sub_jenis extends Seeder
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
                    array('id' => 1, 'nama_level' => 'user'),
                    array('id' => 2, 'nama_level' => 'procurement'),
                    array('id' => 3, 'nama_level' => 'log_wh'),
                    array('id' => 4, 'nama_level' => 'accounting'),];

     	DB::table('level_dokumen')->insert($level);
    }
}
