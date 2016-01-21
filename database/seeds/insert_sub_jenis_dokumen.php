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
        $array = ['id' => '1', 'nama_sub'=> 'Korin Permintaan Pengadaan', 'induk_jenis_dokumen' => '1', 'singkatan' => 'KPP'];
        DB::table('sub_jenis_dokumen')->insert($array);
    }
}
