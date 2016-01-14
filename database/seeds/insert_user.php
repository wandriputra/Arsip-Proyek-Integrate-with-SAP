<?php

use Illuminate\Database\Seeder;

class insert_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->delete();

    	$user = [
    		array(
    			'id' => 1,
    			'username' => 'root',
    			'password' => bcrypt('root'),
    			'status' => 'A',
                'role_user_id' => '1',
                'personil_id' => '1'
    			// 'created_by' => 'null',
    		),
    		array(
    			'id' => 2,
    			'username' => 'admin',
    			'password' => bcrypt('admin'),
    			'status' => 'N',
                'role_user_id' => '1',
                'personil_id' => '1'
    			// 'created_by' => '1',
    		)];

     	DB::table('user')->insert($user);
    }
}
