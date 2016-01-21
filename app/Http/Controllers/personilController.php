<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Personil as Personil;
use App\Models\Unit as Unit;
use App\models\Jabatan as Jabatan;

use Validator;
use Auth;
use Datatables;

class personilController extends Controller
{
    public function getTambahPersonil($value='')
    {
    	$unit = Unit::all();
    	$jabatan = Jabatan::all();
    	$atasan = Personil::all();
        return view('personil.tambah', compact('unit', 'jabatan', 'atasan'));
    }

    public function postTambahPersonil(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'nama_personil' => 'required',
            'unit_id' => 'required',
            'jabatan_id' => 'required',
            'singkatan' => 'required',
        ]);

        $request['created_by'] = Auth::user()->id;

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }
        $input = $request->only(['nik', 'nama_personil', 'email', 'singkatan', 'unit_id', 'jabatan_id', 'atasan_id', 'created_by']);
        Personil::create($input);
        return redirect('personil/list-personil');
    }

    public function getListPersonil()
    {
        
        return view('personil.list-Personil');
    }

    public function getAjaxListPersonil()
    {
        $personil = Personil::all();
        return Datatables::of($personil)
            ->addColumn('nama_personil_singkatan', function($personil){
                return $personil['nama_personil'].' ('.$personil['singkatan'].')';
            })
            ->addColumn('unit', function($personil){
            	return $personil['unit']['nama_unit'];
            })
            ->addColumn('jabatan', function($personil){
            	return $personil['jabatan']['nama_jabatan'];
            })
            ->addColumn('atasan', function($personil){
            	return $personil['atasan']['nama_personil'];
            })         
            ->make(true);
    }
}
