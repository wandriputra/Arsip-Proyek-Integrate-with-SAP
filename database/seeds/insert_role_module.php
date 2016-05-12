<?php

use Illuminate\Database\Seeder;

class insert_role_module extends Seeder
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
        $sql = "INSERT INTO `role_user_has_module` (`role_user_id`, `module_id`, `created_by`) VALUES(1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(2,5,1),(3,10,1),(3,10,1),(4,6,1),(4,6,1),(5,7,1),(5,7,1),(6,8,1),(6,8,1),(7,9,1),(7,9,1);";

        DB::insert($sql);
    }
}
