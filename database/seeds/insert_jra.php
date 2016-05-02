<?php

use Illuminate\Database\Seeder;

class insert_jra extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jra_dokumens')->delete();

        $array = [
            ['id'=>'1', 'kode'=>'DT', 'jenis_arsip'=>'Distribusi Dan Transportasi', 'waktu_aktif'=>'', 'waktu_inaktif'=>'','keterangan'=>'' ,'level'=>'0'],
            ['id'=>'2', 'kode'=>'DT.00', 'jenis_arsip'=>'Transportir', 'waktu_aktif'=>'', 'waktu_inaktif'=>'','keterangan'=>'' ,'level'=>'1'],
            ['id'=>'3', 'kode'=>'DT.00.01', 'jenis_arsip'=>'Evaluasi transpotir', 'waktu_aktif'=>'10', 'waktu_inaktif'=>'8','keterangan'=>'musnah' ,'level'=>'2'],
            ['id'=>'4','kode'=>'DT.00.02', 'jenis_arsip'=>'Petunjuk Transportir',	'waktu_aktif'=>'10', 'waktu_inaktif'=>'8', 'keterangan'=>'Musnah', 'level'=>'2'],
            ['id'=>'5','kode'=>'DT.00.03', 'jenis_arsip'=>'Pemberhentian Transportir',	'waktu_aktif'=>'10', 'waktu_inaktif'=>'8', 'keterangan'=>'Musnah', 'level'=>'2'],
        ];

        DB::table('jra_dokumens')->insert($array);
    }
}
