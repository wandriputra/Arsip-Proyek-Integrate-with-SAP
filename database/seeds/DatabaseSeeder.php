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

        $this->call('insert_role');
        $this->call('insert_unit');
        $this->call('insert_posisi');
        $this->call('insert_personil');
        $this->call('insert_user');
        
        
        Model::reguard();
    }
}
