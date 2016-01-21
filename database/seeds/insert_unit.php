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
        (1,	'Deputy Project Director',	'DPD', '1'),
        (2,	'Engineering and Construction',	'ENC', '1'),
        (3,	'Procurement and Supporting Function',	'PSF', '1'),
        (4,	'Accounting, Finance and Information System',	'AFIS', '1'),
        (5,	'Civil Construction',	'CC', '1'),
        (6,	'Civil Engineering',	'CE', '1'),
        (7,	'Electrical and Instrument Engineering',	'EIE', '1'),
        (8,	'Electrical and Instrument Construction',	'EIC', '1'),
        (9,	'Human Resource and General Affair',	'HRGA', '1'),
        (10, 'Logistic and Warehouse',	'LOGWH', '1'),
        (11, 'Mechanical Construction', 'MC', '1'),
        (12, 'Mechanical Engineering', 'ME', '1'),
        (13, 'Offsite Dispatch', 'OD', '1'),
        (14, 'Offsite Mining', 'OM', '1'),
        (15, 'Project Control and Risk Management', 'PCRM', '1'),
        (16, 'Process Engineering', 'PE', '1'),
        (17, 'Process Engineering and Operation Preparation', 'PEOP', '1'),
        (18, 'Procurement', 'PROC', '1'),
        (19, 'Safety, Health, Environment and Security', 'SHES', '1'),
        (20, 'Tamu Perusahaan', 'TAMU', '1')";

        DB::insert($sql);
    }
}
