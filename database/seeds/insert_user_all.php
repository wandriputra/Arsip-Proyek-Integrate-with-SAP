<?php

use Illuminate\Database\Seeder;

class insert_user_all extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$user = [
            array('id' => 8,'username' => 'afis','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 2, 'personil_id'=> 1),
    		array('id' => 3,'username' => 'hrga','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 7, 'personil_id'=> 1),
    		array('id' => 4,'username' => 'procurement','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 8, 'personil_id'=> 5),
    		array('id' => 5,'username' => 'logistik','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 9, 'personil_id'=> 1),
    		array('id' => 6,'username' => 'warehouse','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 10, 'personil_id'=> 1),
    		array('id' => 7,'username' => 'accounting','password' => bcrypt('12345'),'status' => 'A','created_by' => 1, 'role_user_id' => 11, 'personil_id'=> 1),
    		];
     	DB::table('user')->insert($user);        
    }
}
