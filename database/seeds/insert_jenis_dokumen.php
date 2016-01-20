<?php

use Illuminate\Database\Seeder;

class insert_jenis_dokumen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_dokumen')->delete();

        $sql = "INSERT INTO `jenis_dokumen` (`id`, `nama`, `singkatan`, `created_at`, `updated_at`) VALUES
				(1,	'Korin Pengadaan',	'KPP',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
				(2,	'Porcuser Requisision',	'PR',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00')";

		DB::insert($sql);
    }
}
