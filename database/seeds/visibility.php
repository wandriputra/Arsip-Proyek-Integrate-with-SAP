<?php

use Illuminate\Database\Seeder;

class visibility extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('visibility')->delete();

    	$visibility = [
    		array(
    			'id' => 1,
    			'jenis_visibility' => 'Public',
    			'created_by' => '1',
    		),
    		array(
    			'id' => 2,
    			'jenis_visibility' => 'Private',
    			'created_by' => '1',
    		)];

     	DB::table('visibility')->insert($visibility);
    }
}
