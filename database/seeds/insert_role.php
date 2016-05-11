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
		DB::table('role_user_has_module')->delete();
		DB::table('role_user')->delete();
		
		//perubahan berpengaruh besar ke aplikasi seperti getUpload
    	$role = [
    		array(
    			'id' => 1,
    			'nama_role' => 'admin',
				'keterangan' => 'Role Administrator',
                'created_by' => '1'
    		),
    		array(
    			'id' => 2,
    			'nama_role' => 'user',
				'keterangan' => 'Role user',
				'created_by' => '1'
    		),
    		array(
    			'id' => 3,
    			'nama_role' => 'hrga',
				'keterangan' => 'Role hrga',
				'created_by' => '1'
    		),
            array(
                'id' => 4,
                'nama_role' => 'procurement',
				'keterangan' => 'Role Procurement',
				'created_by' => '1'
            ),
            array(
                'id' => 5,
                'nama_role' => 'logistik',
				'keterangan' => 'Role Logistik',
				'created_by' => '1'
            ),
            array(
                'id' => 6,
                'nama_role' => 'warehouse',
				'keterangan' => 'Role Warehouse',
				'created_by' => '1'
            ),
            array(
                'id' => 7,
                'nama_role' => 'accounting',
				'keterangan' => 'Role Accounting',
				'created_by' => '1'
            ),
    	];


     	DB::table('role_user')->insert($role);
    }
}
