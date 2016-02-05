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
    			'nama_role' => 'Administrator',
                'created_by' => '1'
    		),
    		array(
    			'id' => 2,
    			'nama_role' => 'Uploader Unit',
                'created_by' => '1'
    		),
    		array(
    			'id' => 3,
    			'nama_role' => 'Audit',
                'created_by' => '1'
    		),
    		array(
    			'id' => 4,
    			'nama_role' => 'Manager',
                'created_by' => '1'
    		),
    		array(
    			'id' => 5,
    			'nama_role' => 'Senior Manager',
                'created_by' => '1'
    		),
    		array(
    			'id' => 6,
    			'nama_role' => 'General Manager',
                'created_by' => '1'
    		),
    		array(
    			'id' => 7,
    			'nama_role' => 'HRGA',
                'created_by' => '1'
    		),
            array(
                'id' => 8,
                'nama_role' => 'Procurement',
                'created_by' => '1'
            ),
            array(
                'id' => 9,
                'nama_role' => 'Logistic',
                'created_by' => '1'
            ),
            array(
                'id' => 10,
                'nama_role' => 'Warehouse',
                'created_by' => '1'
            ),
            array(
                'id' => 11,
                'nama_role' => 'Accounting',
                'created_by' => '1'
            ),
    	];


     	DB::table('role_user')->insert($role);
    }
}
