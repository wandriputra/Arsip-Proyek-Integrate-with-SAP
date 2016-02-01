<?php

use Illuminate\Database\Seeder;

class insert_sub_jenis_dokumen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sub_jenis_dokumen')->delete();
        $array = [
            array('id' => '1', 'nama_sub'=> 'Korin Permintaan Pengadaan' ,'singkatan' => 'KPP', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '2', 'nama_sub'=> 'TOR / IFB / Spesifikasi' ,'singkatan' => 'TOR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '3', 'nama_sub'=> 'OE / BOQ (Bill Of Quantity)' ,'singkatan' => 'OE', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '4', 'nama_sub'=> 'Porchuser Requisision' ,'singkatan' => 'PR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '5', 'nama_sub'=> 'Approval Bidder List' ,'singkatan' => 'BL', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '6', 'nama_sub'=> 'Korin Izin Penunjukkan Bidder List' ,'singkatan' => 'KRN BL', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '7', 'nama_sub'=> 'NCR' ,'singkatan' => 'NCR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '8', 'nama_sub'=> 'Risk Assesment' ,'singkatan' => 'URA', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '9', 'nama_sub'=> 'Izin Penunjukan Langsung / Form Persetujuan' ,'singkatan' => 'UFP', 'actifity_id'=>'1', 'created_by'=>'1'),
        ];
        DB::table('sub_jenis_dokumen')->insert($array);
    }
}
