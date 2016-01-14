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
        INSERT INTO `unit` (`id`, `nama`, `singkatan`) VALUES
        (1,	'Deputy Project Director',	'DPD'),
        (2,	'Engineering and Construction',	'ENC'),
        (3,	'Procurement and Supporting Function',	'PSF'),
        (4,	'Accounting, Finance and Information System',	'AFIS'),
        (5,	'Civil Construction',	'CC'),
        (6,	'Civil Engineering',	'CE'),
        (7,	'Electrical and Instrument Engineering',	'EIE'),
        (8,	'Electrical and Instrument Construction',	'EIC'),
        (9,	'Human Resource and General Affair',	'HRGA'),
        (10,	'Logistic and Warehouse',	'LOGWH'),
        (11,	'Mechanical Construction',	'MC'),
        (12,	'Mechanical Engineering',	'ME'),
        (13,	'Offsite Dispatch',	'OD'),
        (14,	'Offsite Mining',	'OM'),
        (15,	'Project Control and Risk Management',	'PCRM'),
        (16,	'Process Engineering',	'PE'),
        (17,	'Process Engineering and Operation Preparation',	'PEOP'),
        (18,	'Procurement',	'PROC'),
        (19,	'Safety, Health, Environment and Security',	'SHES')";

        DB::insert($sql);
    }
}
