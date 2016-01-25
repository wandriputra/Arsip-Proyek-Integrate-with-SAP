<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Unit;

use Validator;
use Auth;
use Datatables;

class unitController extends Controller
{
    public function getTambahUnit($value='')
    {
        $unit = Unit::all();
        return view('unit.tambah', compact('unit'));
    }

    public function postTambahUnit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_unit' => 'required',
            'singkatan' => 'required',
        ]);

        $request['created_by'] = Auth::user()->id;

        if ($validator->fails()) {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
        }
        $input = $request->only(['nama_unit', 'singkatan', 'unit_atasan', 'created_by']);
        Unit::create($input);
        return redirect('unit/list-unit');
    }

    public function getListUnit($value='')
    {
        return view('unit.list');
    }

    public function getAjaxListUnit($value='')
    {
        $unit = Unit::all();
        return Datatables::of($unit)
            ->addColumn('atasan', function($unit){
                return $unit['atasan']['singkatan'];
            }) 
            ->addColumn('action', function($unit){
               return '<a href="'.route('hapus-personil').'/'.$unit->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })        
            ->make(true);
    }

}
