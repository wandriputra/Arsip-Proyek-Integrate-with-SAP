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
    		array('id' => 1,'username' => 'root','password' => bcrypt('root'),'status' => 'A',),
    		array('id' => 2,'username' => 'guest','password' => bcrypt('guest'),'status' => 'A',)];
            
     	DB::table('user')->insert($user);
    }
}
