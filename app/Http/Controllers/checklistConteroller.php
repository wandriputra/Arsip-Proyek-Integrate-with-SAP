<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checklist;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class checklistConteroller extends Controller
{
    public function getList()
    {
        return view('checklist.list_checklist');
    }

    public function getAjaxListChecklist()
    {
        $checklist = Checklist::all();
        return \Datatables::of($checklist)
            ->addColumn('nama_unit', function($checklist){
                return $checklist['unit']['nama_unit'];
            })
            ->addColumn('detail', function($checklist){
                return "<a href='#' class='btn btn-xs btn-info'>Detail</a>";
            })
            ->make(true);
    }
}
