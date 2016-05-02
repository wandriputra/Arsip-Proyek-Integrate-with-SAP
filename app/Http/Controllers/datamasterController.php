<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen;
use App\Models\Sub_jenis_dokumen;
use App\Models\Actifity;
use App\Models\Unit;
use App\Models\Jra_dokumen;

use Auth;
use Datatables;
use Illuminate\Support\Facades\Session;

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
        $jenis = Sub_jenis_dokumen::paginate(15);
    	return view('datamaster.list_sub_jenis', compact('jenis'));
    }

    public function getListActifity()
    {
        $actifity = Actifity::paginate(15);
        return view('datamaster.list_actifity', compact('actifity'));
    }

    public function getListJra()
    {
        $jra = Jra_dokumen::orderBy('kode', 'asc')->paginate(15);
        return view('datamaster.list_jra', compact('jra'));
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
//
    public function getTambahJra()
    {
        $jra = Jra_dokumen::all();
        return view('datamaster.tambah_jra', compact('jra'));
    }

    public function postTambahJra(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'kode' => 'required|unique:jra_dokumens'
        ]);
        if ($validator->fails()){
            \Session::flash('alert-warning', 'Periksa kembali input');
            return redirect()->back()->withInput();
        }
        $data = $request->all();
        $data['level'] = '0';
        $jra = Jra_dokumen::create($data);
        return isset($data['prev_url']) ? redirect($data['prev_url']) : redirect()->back();
    }

    public function getAjaxJraCekKode(Request $request)
    {
        $kode = $request->get('kode');
        $jra = Jra_dokumen::where('kode', 'like', $kode)->get();
        return $jra;
    }
//      TODO; insert jra dan list
//      TODO; list actifity dokumen
    

}
