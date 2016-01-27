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
        DB::table('level_sub_dokumen')->delete();

       $sql = [
            array('level_id'=>'1','sub_jenis_id' => '1'),
            array('level_id'=>'1','sub_jenis_id' => '2')];

     	DB::table('level_sub_dokumen')->insert($sql);
    }
}
