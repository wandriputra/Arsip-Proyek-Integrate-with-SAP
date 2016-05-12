<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Personil as Personil;
use App\Models\Unit as Unit;
use App\Models\Jabatan as Jabatan;
use App\Models\User;

use Validator;
use Auth;
use Datatables;

class personilController extends Controller
{

    function __construct()
    {
        $this->middleware('admin');
    }

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
        ]);

        $request['created_by'] = Auth::user()->id;

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }
        $input = $request->only(['nik', 'nama_personil', 'email', 'singkatan', 'unit_id', 'jabatan_id', 'atasan_id', 'created_by']);
        $input['atasan_id'] = ($input['atasan_id'] != '') ? $input['atasan_id'] : null ;
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
                return $personil['nama_personil'];
            })
            ->addColumn('unit', function($personil){
            	return $personil['unit']['singkatan'];
            })
            ->addColumn('jabatan', function($personil){
            	return $personil['jabatan']['nama_jabatan'];
            })
            ->addColumn('atasan', function($personil){
            	return $personil['atasan']['nama_personil'];
            })
            ->addColumn('action', function($personil){
                $edit_b = '<a href="'.route('edit-personil').'/'.$personil->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $hapus_b = ' <a href="'.route('hapus-personil').'/'.$personil->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
                return $edit_b.$hapus_b;
            })        
            ->make(true);
    }

    public function getPersonilEdit($value='')
    {
        $unit = Unit::all();
        $jabatan = Jabatan::all();
        $atasan = Personil::all();
        $edit = Personil::where('id', $value)->firstOrFail();
        $url = 'personil/personil-edit';
        return view('personil.tambah', compact('unit', 'jabatan', 'atasan', 'edit', 'url'));
    }

    public function postPersonilEdit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_personil' => 'required',
            'unit_id' => 'required',
            'jabatan_id' => 'required',
            'singkatan' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }

        $personil = Personil::find($request['id']);
        $edit = $request->all();
        $personil->nik = $edit['nik'];
        $personil->nama_personil = $edit['nama_personil'];
        $personil->email = $edit['email'];
        $personil->jabatan_id = $edit['jabatan_id'];
        $personil->singkatan = $edit['singkatan'];
        $personil->unit_id = ($edit['unit_id']) ?  $edit['unit_id'] : 'null' ;
        $personil->atasan_id =$edit['atasan_id'];

        $personil->save();
        return redirect('personil/list-personil');
    }

    public function getPersonilHapus($value='')
    {
        // if($value === 1) return redirect()->back();
        $personil = Personil::where('id',$value);
        $user = User::where('personil_id', $value)->get();
        foreach ($user as $key => $value) {
            //set N to user status
        }
        // return redirect()->back()->withMassage('Berhasil dihapus');
    }
}