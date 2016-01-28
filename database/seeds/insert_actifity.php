<?php

use Illuminate\Database\Seeder;

class insert_actifity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('actifity')->delete();

    	$level = [
                    array('id' => 1, 'nama_actifity' => 'Korin permintaan pembuatan PR dari User beserta reservasi'),
                    array('id' => 2, 'nama_actifity' => 'User Unit Sesudah Pengadaan'),
                    array('id' => 3, 'nama_actifity' => 'Procurement'),
                    array('id' => 4, 'nama_actifity' => 'Logistic & Warehouse'),
                    array('id' => 5, 'nama_actifity' => 'Accounting'),];

     	DB::table('actifity')->insert($level);
    }
}
