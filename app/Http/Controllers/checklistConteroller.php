<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Checklist;
use App\Models\Actifity;
use App\Models\Sub_jenis_dokumen;
use App\Models\Unit;
use App\Models\Checklist_relasion;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class checklistConteroller extends Controller
{
    public function getList()
    {
        return view('checklist.list_checklist');
    }

    public function getIndex()
    {
        return view('checklist.list_checklist');
    }

    public function getBuat()
    {
        $cheklist = Checklist::all();
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
                return $checklist['nama_checklist'];
            })
            ->addColumn('nama_unit', function($checklist){
                return $checklist['unit']['nama_unit'];
            })
            ->addColumn('detail', function($checklist){
                return "<a href='".url('checklist/detail/')."/".$checklist['id']."' class='btn btn-xs btn-info'><i class='fa fa-search'></i></a> <a href='".url('checklist/edit/')."/".$checklist['id']."' class='btn btn-xs btn-success'><i class='fa fa-pencil'></i></a> <a href='".url('checklist/hapus/')."/".$checklist['id']."' class='btn btn-xs btn-danger'><i class='fa fa-trash'></i></a>";
            })
            ->make(true);
    }

    public function postBuat(Request $request)
    {
        $data = $request->all();
        $data['created_by'] = \Auth::user()->id;
        $data_create = Checklist::create($data);
        foreach($data['jenis_dokumen'] as $jenis){
            $data_relation['sub_jenis_id'] = $jenis;
            $data_relation['actifity_id'] = $data['actifity'];
            $data_relation['checklist_id'] = $data_create['id'];
            Checklist_relasion::create($data_relation);
        }
        return redirect('checklist/edit'.'/'.$data_create['id']);
    }

    public function getDetail($id)
    {
        //TODO: check jika user punya authentifikasi untuk mengakses module
        $data = Checklist::find($id)->firstOrFail();
        $list = Checklist_relasion::with('checklist', 'actifity', 'sub_jenis_dok')->where('checklist_id', $id)->orderBy('actifity_id')->get();
        $name ='';
        $i= 1;
        foreach($list as $val){
            if($name === $val['actifity']['nama_actifity']){
                $i++;
            }else{
                $i=1;
            }
            $act[$val['actifity']['nama_actifity']]['rowspan'] = $i;
            $name = $val['actifity']['nama_actifity'];
        }
        return view('checklist.detail', compact('data', 'list', 'act'));
        
    }

    public function getHapus($id)
    {
        //TODO: check jika user punya authentifikasi untuk menghapus
        $del = Checklist::where('id', $id)->firstOrFail();
        \Session::flash("alert-success", "Checklist ".$del['nama_checklist']." berhasil di hapus");
        $del->delete();
        return redirect('checklist/list');
    }

    public function getEdit($id)
    {
        $data = Checklist::find($id)
            ->firstOrFail();
        $list = Checklist_relasion::with('checklist', 'actifity', 'sub_jenis_dok')
            ->where('checklist_id', $id)
            ->orderBy('actifity_id')
            ->get();
        $name ='';
        $i= 1;
        foreach($list as $val){
            if($name === $val['actifity']['nama_actifity']){
                $i++;
            }else{
                $i=1;
            }
            $act[$val['actifity']['nama_actifity']]['rowspan'] = $i;
            $name = $val['actifity']['nama_actifity'];
        }
        return view('checklist.edit', compact('data', 'list', 'act'));
    }

    public function postEdit(Request $request)
    {
        $data = $request->all();
        foreach($data['jenis_dokumen'] as $jenis){
            $data_relation['sub_jenis_id'] = $jenis;
            $data_relation['actifity_id'] = $data['actifity'];
            $data_relation['checklist_id'] = $data['checklist_id'];
            Checklist_relasion::create($data_relation);
        }
        return redirect('checklist/edit'.'/'.$data['checklist_id']);
    }

    //TODO: hapus checklist
    //TODO: edit / add actifity checklist
    //TODO: print checklist to pdf
    //TODO: upload dokumen via cheklist list /detail
    //TODO: verify checklist

//Checklist hanya bisa dihapus oleh user unit dan admin unit yang bersangkutan
}
