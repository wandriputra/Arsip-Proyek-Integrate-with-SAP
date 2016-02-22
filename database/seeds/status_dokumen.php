<?php

use Illuminate\Database\Seeder;

class status_dokumen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_dokumen')->delete();

    	$status_dokumen = [
    		array(
    			'id' => 1,
    			'nama_status' => 'Verified',
    			'created_by' => '1',
    		),
    		array(
    			'id' => 2,
    			'nama_status' => 'Unverified',
    			'created_by' => '1',
    		)];

     	DB::table('status_dokumen')->insert($status_dokumen);
    }
}
