<?php

use Illuminate\Database\Seeder;

class insert_unit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit')->delete();

        $sql ="
        INSERT INTO `unit` (`id`, `nama_unit`, `singkatan`, `created_by`) VALUES
        (1, 'Semua Unit',  'All', '1'),
        (2,	'Deputy Project Director',	'DPD', '1'),
        (3,	'SM Engineering and Construction',	'ENC', '1'),
        (4,	'SM Procurement and Supporting Function',	'PSF', '1'),
        (5,	'SM Accounting, Finance and Information System',	'AFIS', '1'),
        (6,	'SM Civil Construction',	'CC', '1'),
        (7,	'SM Civil Engineering',	'CE', '1'),
        (8,	'SM Electrical and Instrument Engineering',	'EIE', '1'),
        (9,	'SM Electrical and Instrument Construction',	'EIC', '1'),
        (10, 'SM Human Resource and General Affair',	'HRGA', '1'),
        (11, 'SM Logistic and Warehouse',   'LOGWH', '1'),
        (12, 'SM Mechanical Construction', 'MC', '1'),
        (13, 'SM Mechanical Engineering', 'ME', '1'),
        (14, 'SM Offsite Dispatch', 'OD', '1'),
        (15, 'SM Offsite Mining', 'OM', '1'),
        (16, 'SM Project Control and Risk Management', 'PCRM', '1'),
        (17, 'SM Process Engineering', 'PE', '1'),
        (18, 'SM Process Engineering and Operation Preparation', 'PEOP', '1'),
        (19, 'SM Procurement', 'PROC', '1'),
        (20, 'SM Safety, Health, Environment and Security', 'SHES', '1'),
        (21, 'Tamu Perusahaan', 'TAMU', '1')";

        DB::insert($sql);
    }
}
