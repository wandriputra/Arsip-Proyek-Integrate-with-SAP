<?php

use Illuminate\Database\Seeder;

class insert_actifity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('actifity')->delete();

    	$level = [
                // User
                array('id' => 1, 'nama_actifity' => 'KPP User', 'unit_id' => '1', 'jenis_id'=> '1'),
                array('id' => 2, 'nama_actifity' => 'Dokumen User Setelah PO', 'unit_id' => '1', 'jenis_id'=> '1'),
               // Procurement
                array('id' => 3, 'nama_actifity' => 'RFQ', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 4, 'nama_actifity' => 'Aanwijzing', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 5, 'nama_actifity' => 'Dokumen Penawaran', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 6, 'nama_actifity' => 'Evaluasi Teknik', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 7, 'nama_actifity' => 'Izin Pembukaan Penawaran Harga', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 8, 'nama_actifity' => 'Pembukaan Penawaran Harga', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 9, 'nama_actifity' => 'Evalusi Harga', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 10, 'nama_actifity' => 'Negosiasi Harga', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 11, 'nama_actifity' => 'Proposal PO', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 12, 'nama_actifity' => 'Tanda Tangan PO dan Kontrak', 'unit_id' => '19', 'jenis_id'=> '1'),
                array('id' => 13, 'nama_actifity' => 'Kick off Meeting', 'unit_id' => '19', 'jenis_id'=> '1'),
                // Kontrak
                array('id' => 14, 'nama_actifity' => 'Contract Drafting', 'unit_id' => '22', 'jenis_id'=> '1'),
                array('id' => 15, 'nama_actifity' => 'Contract Monitoring', 'unit_id' => '22', 'jenis_id'=> '1'),
                array('id' => 16, 'nama_actifity' => 'Contract Closing', 'unit_id' => '22', 'jenis_id'=> '1'),
                // Warehouse
                array('id' => 17, 'nama_actifity' => 'Pembuatan PR stock', 'unit_id' => '23', 'jenis_id'=> '1'),
                array('id' => 18, 'nama_actifity' => 'Penerimaan Barang', 'unit_id' => '23', 'jenis_id'=> '1'),
                array('id' => 19, 'nama_actifity' => 'Penyimpanan Barang', 'unit_id' => '23', 'jenis_id'=> '1'),
                array('id' => 20, 'nama_actifity' => 'Pengeluaran Barang', 'unit_id' => '23', 'jenis_id'=> '1'),
                array('id' => 21, 'nama_actifity' => 'Mutasi Barang (Plan to Plan)', 'unit_id' => '23', 'jenis_id'=> '1'),
                array('id' => 22, 'nama_actifity' => 'PO Outstanding', 'unit_id' => '23', 'jenis_id'=> '1'),
                ];

     	DB::table('actifity')->insert($level);
    }
}
