<?php

use Illuminate\Database\Seeder;

class insert_posisi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posisi')->delete();

        $sql = 
       		"INSERT INTO `posisi` (`id`, `nama`, `singkatan`, `created_at`, `updated_at`) VALUES
			(1,	'Kepala Proyek Indarung VI',	NULL,	NULL,	NULL),
			(2,	'General Manager',	'GM',	NULL,	NULL),
			(3,	'Staff DPD',	NULL,	NULL,	NULL),
			(4,	'Senior Manager',	'SM',	NULL,	NULL),
			(5,	'Manager',	'MGR',	NULL,	NULL),
			(6,	'Kepala Urusan',	'KAUR',	NULL,	NULL),
			(7,	'Karyawan',	NULL,	NULL,	NULL),
			(8,	'PKWT Profesional',	NULL,	NULL,	NULL),
			(9,	'PKWT Biasa',	NULL,	NULL,	NULL)";

		DB::insert($sql);
    }
}
