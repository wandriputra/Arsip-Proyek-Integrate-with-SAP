<?php

use Illuminate\Database\Seeder;

class insert_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('role_user')->delete();

    	$role = [
    		array(
    			'id' => 1,
    			'nama' => 'Administrator',
    		),
    		array(
    			'id' => 2,
    			'nama' => 'Uploader Unit',
    		),
    		array(
    			'id' => 3,
    			'nama' => 'Audit',
    		),
    		array(
    			'id' => 4,
    			'nama' => 'Manager',
    		),
    		array(
    			'id' => 5,
    			'nama' => 'Senior Manager',
    		),
    		array(
    			'id' => 6,
    			'nama' => 'General Manager',
    		),
    		array(
    			'id' => 7,
    			'nama' => 'Uploader HRGA',
    		),
    	];


     	DB::table('role_user')->insert($role);
    }
}
