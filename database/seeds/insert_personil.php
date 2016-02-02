<?php

use Illuminate\Database\Seeder;

class insert_personil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('personil')->delete();
        $array = ['id' => '1', 'nik'=> null, 'nama_personil' => 'Wandri Eka Putra', 'email'=> 'wandri.putra@semenindonesia.com', 'unit_id'=>'5', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1'];
        $array2 = ['id' => '3', 'nik'=> null, 'nama_personil' => 'Administrator Aplikasi', 'email'=> 'admin@arsipproyek.com', 'unit_id'=>'5', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1'];
        $array1 = ['id'=> '2', 'nik'=> null, 'nama_personil' => 'Tamu Perushaan', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'21', 'jabatan_id'=>'10', 'atasan_id'=>null, 'created_by'=>'1'];
        DB::table('personil')->insert(compact('array', 'array1', 'array2'));
        
    }
}
