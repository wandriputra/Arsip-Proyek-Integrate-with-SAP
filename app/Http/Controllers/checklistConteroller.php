<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checklist;
use App\Models\Actifity;
use App\Models\Sub_jenis_dokumen;
use App\Models\Unit;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class checklistConteroller extends Controller
{
    public function getList()
    {
        return view('checklist.list_checklist');
    }

    public function getBuat()
    {
        $actifity = actifity::all();
        $jenis = sub_jenis_dokumen::all();
        $unit = unit::all();
        return view('checklist.buat_checklist', compact('actifity', 'jenis', 'unit'));
    }

    public function getAjaxListChecklist()
    {
        $checklist = Checklist::with('unit')->get();
        return \Datatables::of($checklist)
            ->addColumn('nama_checklist', function($checklist){
                return $checklist['nama_checklist']." <a href='#' class='btn btn-xs btn-success'><i class='fa fa-search'></i></a>";
            })
            ->addColumn('nama_unit', function($checklist){
                return $checklist['unit']['nama_unit'];
            })
            ->addColumn('detail', function($checklist){
                return "<a href='#' class='btn btn-xs btn-default'><i class='fa fa-search'></i></a>";
            })
            ->make(true);
    }
}
