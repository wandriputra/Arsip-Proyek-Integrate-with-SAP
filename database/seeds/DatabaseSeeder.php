<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('insert_user'); 
        $this->call('insert_role');
        $this->call('insert_unit');
        $this->call('insert_jabatan');
        $this->call('insert_jenis_dokumen');
        $this->call('insert_sub_jenis_dokumen');
        $this->call('insert_personil');
        
        DB::table('user')
            ->where('id', 1)
            ->update(array('created_by' => 1, 'role_user_id' => 1, 'personil_id'=> 1));
        
        Model::reguard();
    }
}
