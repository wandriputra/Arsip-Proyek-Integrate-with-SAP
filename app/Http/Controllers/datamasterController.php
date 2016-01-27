<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen;
use App\Models\Level_dokumen;
use App\Models\Sub_jenis_dokumen;

use Datatables;

class datamasterController extends Controller
{
    public function getInsertJenisDokumen()
    {
        return view('datamaster.insert_jenis_dokumen');
    }

    public function getInsertSubJenis()
    {
        $jenis_dokumen = Jenis_dokumen::all();
        $level_dokumen = Level_dokumen::all();
        return view('datamaster.insert_sub_jenis', compact('jenis_dokumen', 'level_dokumen'));
    }

    public function postInsertSubJenis(Request $request)
    {
    	$data = $request->all();
    	$sub_jenis = Sub_jenis_dokumen::create($data);
    	$sub_jenis->level_dokumen()->attach($data['level_id']);
    	return redirect('data/list-sub-jenis');
    }

    public function getListSubJenis($value='')
    {
    	return view('datamaster.list_sub_jenis');
    }

    public function getAjaxListSubJenis($value='')
    {
    	$sub_jenis = Sub_jenis_dokumen::all();
    	return Datatables::of($sub_jenis)
    		->addColumn('jenis_dokumen', function($sub_jenis){
    			return $sub_jenis->jenis_dokumen->nama_jenis;
    		})
    		->addColumn('level_dokumen', function($sub_jenis){
    			foreach ($sub_jenis->level_dokumen as $key => $value) {
    				return $value->nama_level;
    			}
    		})
    		->make(true);
    }

}
