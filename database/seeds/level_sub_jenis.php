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
		DB::table('level_sub_jenis')->delete();

    	$level = [
    			'id' => 1,
    			'nama_level' => 'user',
                'sub_jenis_id' => '1'
    		];

     	DB::table('level_sub_jenis')->insert($level);
    }
}
