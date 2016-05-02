<?php

use Illuminate\Database\Seeder;

class insert_jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jabatan')->delete();

        $sql = 
       		"INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_by`) VALUES
			(1,	'Kepala Proyek Indarung VI', '1'),
			(2,	'General Manager', '1'),
			(3,	'Staff DPD', '1'),
			(4,	'Senior Manager', '1'),
			(5,	'Manager', '1'),
			(6,	'Kepala Urusan', '1'),
			(7,	'Karyawan', '1'),
			(8,	'PKWT Profesional', '1'),
			(9,	'PKWT Biasa', '1'),
            (10, 'Tamu Perusahaan', '1')";

		DB::insert($sql);
    }
}
