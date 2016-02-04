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
            // User > KPP
            array('id' => '1', 'nama_sub'=> 'Korin Permintaan Pengadaan' ,'singkatan' => 'KPP', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '2', 'nama_sub'=> 'TOR / IFB / Spesifikasi' ,'singkatan' => 'TOR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '3', 'nama_sub'=> 'OE / BOQ (Bill Of Quantity)' ,'singkatan' => 'OE', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '4', 'nama_sub'=> 'Porchuser Requisision' ,'singkatan' => 'PR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '5', 'nama_sub'=> 'Approval Bidder List' ,'singkatan' => 'BL', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '6', 'nama_sub'=> 'Korin Izin Penunjukkan Bidder List' ,'singkatan' => 'KRN BL', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '7', 'nama_sub'=> 'NCR' ,'singkatan' => 'NCR', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '8', 'nama_sub'=> 'Risk Assesment' ,'singkatan' => 'URA', 'actifity_id'=>'1', 'created_by'=>'1'),
            array('id' => '9', 'nama_sub'=> 'Izin Penunjukan Langsung / Form Persetujuan' ,'singkatan' => 'UFP', 'actifity_id'=>'1', 'created_by'=>'1'),
            // Procurement > RFQ
            array('id' => '10', 'nama_sub'=> 'Undangan RFQ/Aanwijzing' ,'singkatan' => 'RFQ', 'actifity_id'=>'3', 'created_by'=>'1'),
            array('id' => '11', 'nama_sub'=> 'Penjelasan Spesifikasi' ,'singkatan' => '', 'actifity_id'=>'3', 'created_by'=>'1'),
            // Procurement > Aanwijzing
            array('id' => '12', 'nama_sub'=> 'Bahan presentasi mengenai kebutuhan terhadap barang / pekerjaan' ,'singkatan' => '', 'actifity_id'=>'4', 'created_by'=>'1'),
            array('id' => '13', 'nama_sub'=> 'Berita Acara Aanwijzing' ,'singkatan' => '', 'actifity_id'=>'4', 'created_by'=>'1'),
            // Procurement > Dokumen Penawaran
            array('id' => '14', 'nama_sub'=> 'Dokumen penawaran administrasi, teknis, komersil dan jaminan penawaran' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            array('id' => '15', 'nama_sub'=> 'Berita Acara Pemasukan Penawaran' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            array('id' => '16', 'nama_sub'=> 'Surat Kuasa' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            array('id' => '17', 'nama_sub'=> 'Copy Bid Bond' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            array('id' => '18', 'nama_sub'=> 'Resume Hasil Tender (gagal tender)' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            // Procurement > Evaluasi Teknis
            array('id' => '19', 'nama_sub'=> 'Korin Pemberitahuan Hasil Tender ke User' ,'singkatan' => '', 'actifity_id'=>'5', 'created_by'=>'1'),
            array('id' => '20', 'nama_sub'=> 'Korin Permintaan Evaluasi Teknis ke User' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '21', 'nama_sub'=> 'Notulen rapat / dokumen klarifikasi' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '22', 'nama_sub'=> 'Korin permintaan perubahan spesifikasi' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '23', 'nama_sub'=> 'Dokumen Klarifikasi' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '24', 'nama_sub'=> 'Klarifikasi Teknis' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '25', 'nama_sub'=> 'Notulen Rapat / Dokumen Klarifikasi' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '26', 'nama_sub'=> 'Korin Hasil Evaluasi Teknis dari User' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '27', 'nama_sub'=> 'Resume Hasil Tender (gagal tender) - cocok hanya1 vendor' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '28', 'nama_sub'=> 'Korin Pemberitahuan Hasil Tender ke User' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            array('id' => '29', 'nama_sub'=> 'KRE Pemberitahuan Hasil Evaluasi Teknis Ke Vendor (GAGAL TENDER)' ,'singkatan' => '', 'actifity_id'=>'6', 'created_by'=>'1'),
            // Procurement > Izin Pembukaan Penawaran HArga
            array('id' => '30', 'nama_sub'=> 'Proposal Izin Pembukaan Penawaran Harga' ,'singkatan' => '', 'actifity_id'=>'7', 'created_by'=>'1'),
            array('id' => '31', 'nama_sub'=> 'Undangan Pembukaan Komersil' ,'singkatan' => '', 'actifity_id'=>'7', 'created_by'=>'1'),
            array('id' => '32', 'nama_sub'=> 'KRE Pemberitahuan Hasil Evaluasi Teknis Ke Vendor (tidak lulus evaluasi teknis)' ,'singkatan' => '', 'actifity_id'=>'7', 'created_by'=>'1'),
            // Procurement Pembukaan Penawaran Harga
            array('id' => '33', 'nama_sub'=> 'Dokumen komersil' ,'singkatan' => '', 'actifity_id'=>'8', 'created_by'=>'1'),
            array('id' => '34', 'nama_sub'=> 'Dokumen jaminan penawaran sesuai dengan harga terbaru' ,'singkatan' => '', 'actifity_id'=>'8', 'created_by'=>'1'),
            array('id' => '35', 'nama_sub'=> 'Berita Acara Sebelum Pemeriksaan Dokumen Komersil' ,'singkatan' => '', 'actifity_id'=>'8', 'created_by'=>'1'),
            array('id' => '36', 'nama_sub'=> 'Berita Acara Pemeriksaan Dokumen Komersil' ,'singkatan' => '', 'actifity_id'=>'8', 'created_by'=>'1'),
            array('id' => '37', 'nama_sub'=> 'Surat Kuasa' ,'singkatan' => '', 'actifity_id'=>'8', 'created_by'=>'1'),
            // Procurement Penawaran Harga
            array('id' => '38', 'nama_sub'=> 'Berita Acara Evaluasi Harga Sebelum Diskon yang berisi rangking masing-masing vendor (TCO/ Non TCO)' ,'singkatan' => '', 'actifity_id'=>'9', 'created_by'=>'1'),
            // Procurement Negosiasi
            array('id' => '39', 'nama_sub'=> 'Undangan Negosiasi Harga' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '40', 'nama_sub'=> 'Notulen rapat perubahan delivery time' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '41', 'nama_sub'=> 'Notulen rapat sebelum negosiasi harga' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '42', 'nama_sub'=> 'Berita Acara Evaluasi Harga Sesudah Diskon yang berisi Nominasi vendor pemenang / Berita Acara Negosiasi Harga (e-Auction / manual)' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '43', 'nama_sub'=> 'Korin klarifikasi penawaran harga di atas OE ke User*' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '44', 'nama_sub'=> 'Korin hasil klarifikasi penawaran harga di atas OE dari User *' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '45', 'nama_sub'=> 'Resume Hasil Tender (gagal tender) - di atas OE' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            array('id' => '46', 'nama_sub'=> 'Korin Pemberitahuan Hasil Tender ke User' ,'singkatan' => '', 'actifity_id'=>'10', 'created_by'=>'1'),
            // Procurement Proposal PO
            array('id' => '47', 'nama_sub'=> 'Proposal PO yang telah disetujui pejabat berwenang' ,'singkatan' => '', 'actifity_id'=>'11', 'created_by'=>'1'),
            array('id' => '48', 'nama_sub'=> 'Izin / approval penempatan order' ,'singkatan' => '', 'actifity_id'=>'11', 'created_by'=>'1'),
            array('id' => '49', 'nama_sub'=> 'Pemberitahuan Pemenang dan Masa Sanggah' ,'singkatan' => '', 'actifity_id'=>'11', 'created_by'=>'1'),
            // Procurement Penandatanganan PO & Kontrak
            array('id' => '50', 'nama_sub'=> 'Konfirmasi Order (KO)' ,'singkatan' => '', 'actifity_id'=>'12', 'created_by'=>'1'),
            array('id' => '51', 'nama_sub'=> 'Print out PO / kontrak' ,'singkatan' => '', 'actifity_id'=>'12', 'created_by'=>'1'),
            array('id' => '52', 'nama_sub'=> 'Jaminan Pelaksanaan Pengadaan  (jika nilai pengadaan diatas 500 juta, range 5% dari nilai pengadaan)' ,'singkatan' => '', 'actifity_id'=>'12', 'created_by'=>'1'),
            array('id' => '53', 'nama_sub'=> 'Jaminan Pemeliharaan Pengadaan  (jika pengadaan ada Warranty)' ,'singkatan' => '', 'actifity_id'=>'12', 'created_by'=>'1'),
            // Procurement Kick Off Meeting
            array('id' => '54', 'nama_sub'=> 'Undangan Kick off Meeting' ,'singkatan' => '', 'actifity_id'=>'13', 'created_by'=>'1'),
            array('id' => '55', 'nama_sub'=> 'Dokumen Kontrak** yang telah ditandatangani oleh pejabat berwenang' ,'singkatan' => '', 'actifity_id'=>'13', 'created_by'=>'1'),
            array('id' => '56
        ];
        DB::table('sub_jenis_dokumen')->insert($array);
    }
}
