<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen;
use App\Models\Sub_jenis_dokumen;
use App\Models\Actifity;
use App\models\Unit;

use Auth;
use Datatables;

class datamasterController extends Controller
{

    public function getInsertJenisDokumen()
    {
        return view('datamaster.insert_jenis_dokumen');
    }

    public function getInsertSubJenis()
    {
        $actifity = Actifity::all();
        $unit = Unit::all();
        return view('datamaster.tambah_sub_jenis', compact('actifity','unit'));
    }

    public function postInsertSubJenis(Request $request)
    {
    	$data = $request->all();
        $data['created_by'] = Auth::user()->id;
    	$sub_jenis = Sub_jenis_dokumen::create($data);
    	return redirect($data['prev_url']);
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

    public function getTambahActifity()
    {
        $jenis_dokumen = Jenis_dokumen::all();
        $unit = Unit::all();
        return view('datamaster.tambah_actifity', compact('jenis_dokumen', 'unit'));
    }

    public function postTambahActifity(Request $request)
    {
        $data = $request->all();
        $sub_jenis = Actifity::create($data);
        return redirect($data['prev_url']);
        // return redirect('data/list-actifity');
    }

}
