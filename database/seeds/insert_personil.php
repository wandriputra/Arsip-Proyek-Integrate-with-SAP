<?php

use Illuminate\Database\Seeder;

class insert_personil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('personil')->delete();
        $sql = "
			INSERT INTO `personil` (`id`, `nik`, `nama`, `singkatan`, `unit_id`, `posisi_id`, `email`, `gmail`, `created_at`, `updated_at`, `created_by`) VALUES
			(1,	'5986009',	'Minto Saksono',	'MO',	1,	1,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(2,	'6796004',	'Dasrial',	'DSL',	2,	2,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(3,	'6996005',	'Amral Ahmad',	'ARL',	3,	2,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(4,	'',	'Chairinal Chaidir',	'CC',	20,	3,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(5,	'7405001',	'Rinold Thamrin',	'RT',	4,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(6,	'7905011',	'Hermawan Ardiyanto',	'HAR',	4,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(7,	'7302022',	'Thomy Hampri Yandi',	'THY',	4,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(8,	'6082110',	'Edison Bahtiar',	'EBC',	5,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(9,	'8109042',	'Ahmad Subekti',	'ASB',	5,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(10,	'8209048',	'Irwan Adi N',	'IAN',	5,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(11,	'6082182',	'Hendri Lumumba',	'HL',	6,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(12,	'6182119',	'Jasnipol',	'JS',	6,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(13,	'8309043',	'Nurita H',	'NH',	6,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(14,	'6896012',	'Abdul Hakim L',	'AHL',	7,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(15,	'7097002',	'Desramon',	'DRM',	8,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(16,	'8409011',	'Arief Rahman Hakim',	'ARH',	7,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(17,	'8309014',	'Harry Fajri Z',	'HFZ',	8,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(18,	'8209013',	'Dian Eka P',	'DEP',	8,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(19,	NULL,	'Win Bernadino',	'WB',	9,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(20,	'8305002',	'M. Ikrar',	'MIK',	10,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(21,	'6183016',	'Syaipul Wisno',	'SWN',	10,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(22,	'8209018',	'R. Nicko Yudah K',	'NYK',	10,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(23,	'8311190',	'Ferry Ferdinan',	NULL,	10,	7,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(24,	'7083023',	'Lamsuhur',	NULL,	10,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
			(25,	'6698053',	'Jayus Karnedi',	NULL,	10,	7,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(26,	NULL,	'Afrinaldi',	NULL,	10,	7,	NULL,	NULL,	NULL,	NULL,	NULL,	1),
			(27,	'5778234',	'Ermius Donsan',	NULL,	10,	8,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(28,	'4444017',	'Robbi R.Sukanda',	NULL,	10,	6,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(29,	NULL,	'Eka Devi',	NULL,	10,	7,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(30,	NULL,	'Subrianto',	NULL,	10,	7,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(31,	'1399083',	'Doni Rachvi Hendra',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(32,	'1399075',	'Abizar Latief Hakim',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(33,	'1399085',	'Fedora Amabila',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(34,	'1499041',	'Yulisman',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(35,	NULL,	'Rahmadi Ikhsan Harza',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(36,	NULL,	'Febriza Imansuri',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(37,	NULL,	'Andra Muhaimin Lazuardi',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(38,	NULL,	'Iwan Setiawan',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(39,	NULL,	'Ramli',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(40,	NULL,	'Musriadi',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(41,	NULL,	'Nofrianto',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(42,	NULL,	'Hafizha Ulfina',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(43,	NULL,	'Ming Mushadi',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(44,	NULL,	'Dara Arbia Septari',	NULL,	10,	9,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(45,	'6999075',	'Very Harjanto',	'VHO',	11,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(46,	'7909038',	'Irwan Kartadi P',	'IKP',	11,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(47,	'8009039',	'Raditya Algadri',	'RAD',	11,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(48,	'7702017',	'Mardian',	'MDN',	12,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(49,	'8409037',	'Andra Novendri',	'ADR',	12,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(50,	'6992016',	'Novriadi M',	'NOV',	12,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(51,	'6693003',	'Fidel Bestri',	'FB',	13,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(52,	'8209015',	'Fero Gusfa',	'FG',	13,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(53,	'8105006',	'Dedi M Sidiq',	'DMS',	14,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(54,	'8409041',	'Aris Supriyatna',	'ARS',	14,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(55,	'8109003',	'M. Choiril Anam',	'MCA',	14,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(56,	'8305010',	'Lilik A Sugiyono',	'LAS',	15,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(57,	'8205018',	'Palman',	'PAL',	15,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(58,	'6902011',	'Apriyendi',	'APY',	16,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(59,	'7805016',	'M. Ikhlas',	'MIS',	17,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(60,	'8009032',	'Ujang Friatna',	'UF',	17,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(61,	'6897013',	'Pri Gustari Akbar',	'PRI',	18,	4,	'pri.akbar@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(62,	'8509008',	'Piery Togap',	'GAP',	18,	5,	'piery.togap@semenindonesia.com',	'piery.togap@gmail.com',	'2016-01-08 16:02:47',	NULL,	1),
			(63,	'8309036',	'Donny Aswin Idham',	'DAI',	18,	5,	'donny.idham@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(64,	'7599045',	'Hamdy Ayussa',	'Hay',	18,	6,	'hamdi.ayussa@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(65,	'1399087',	'Ichwan Ichsan',	'ich',	18,	9,	'ichwan.ichsan@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(66,	'1399094',	'Revi Putri Ruwinda',	'rvi',	18,	9,	'revi.putri@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(67,	'1399089',	'Mutiara Yetrina',	'tya',	18,	9,	'mutiara.yetrina@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(68,	'1399086',	'Ice Harisandy',	'ice',	18,	9,	'ice.harisandy@semenindonesia.com',	'ice.harisandy.pind6@gmail.com',	'2016-01-08 16:02:47',	NULL,	1),
			(69,	'1399079',	'Apriade Saputra',	'ade',	18,	9,	'apriade.saputra@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(70,	'1399076',	'Adynda',	'dyn',	18,	9,	'adynda.mathias@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(71,	'1399081',	'Ifzal Syamra',	'ifz',	18,	9,	'ifzal.syamra@semenindonesia.com',	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(72,	'',	'Habiburrahman',	'hb',	18,	9,	NULL,	'habiburrahman.1430@gmail.com',	'2016-01-08 16:02:47',	NULL,	1),
			(73,	'5878213',	'Nursyam',	'NS',	19,	4,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(74,	'6387045',	'Ramli Can',	'RC',	19,	5,	NULL,	NULL,	'2016-01-08 16:02:47',	NULL,	1),
			(75,	'',	'Agus Boing',	'',	21,	10,	NULL,	NULL,	NULL,	NULL,	1)";
		// DB::insert($sql);
			$query = "insert into personil (`id`, `nik`, `nama`, `singkatan`, `unit_id`, `posisi_id`, `email`, `gmail`, `created_at`, `updated_at`, `created_by`) VALUES ('1', '', 'Wandri Eka Putra', 'wep', '4', '9', 'wandri.putra@semenindonesia.com', 'wandri.putra@gmail.com',null,null,null)";
			// DB::insert($query);
    }
}
