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

        $sql = "INSERT INTO `jenis_dokumen` (`id`, `nama_jenis`, `created_by`) VALUES
                (1, 'Pengadaan PO', '1'),
                (2, 'Pengadaan Non PO', '1'),
                (3, 'SPJ', '1'),
				(4,	'Non Pengadaan', '1')";
		DB::insert($sql);
    }
}
