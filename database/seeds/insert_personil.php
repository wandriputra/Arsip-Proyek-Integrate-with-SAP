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
        $array = [
            array('id' => '1', 'nik'=> null, 'nama_personil' => 'Wandri Eka Putra', 'email'=> 'wandri.putra@semenindonesia.com', 'unit_id'=>'5', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id' => '3', 'nik'=> null, 'nama_personil' => 'Administrator Aplikasi', 'email'=> 'admin@arsipproyek.com', 'unit_id'=>'5', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '2', 'nik'=> null, 'nama_personil' => 'Tamu Perushaan', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'21', 'jabatan_id'=>'10', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '4', 'nik'=> null, 'nama_personil' => 'Admin ICT', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'5', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '5', 'nik'=> null, 'nama_personil' => 'Admin Procurement', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'19', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '6', 'nik'=> null, 'nama_personil' => 'Admin Warehouse', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'23', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '7', 'nik'=> null, 'nama_personil' => 'Admin Logistik', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'22', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            array('id'=> '8', 'nik'=> null, 'nama_personil' => 'Admin Accounting', 'email'=> 'tamu@semenindonesia.com', 'unit_id'=>'25', 'jabatan_id'=>'9', 'atasan_id'=>null, 'created_by'=>'1')
            ];
        
        DB::table('personil')->insert($array);
        
    }
}
