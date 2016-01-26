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
        array('id' => '1', 'nama_sub'=> 'Korin Permintaan Pengadaan', 'induk_jenis_dokumen' => '1', 'singkatan' => 'KPP'),
        array('id' => '2', 'nama_sub'=> 'Term of Reference', 'induk_jenis_dokumen' => '1', 'singkatan' => 'TOR')];
        DB::table('sub_jenis_dokumen')->insert($array);
    }
}
