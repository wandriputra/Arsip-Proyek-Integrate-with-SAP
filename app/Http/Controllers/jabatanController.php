<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jabatan;

use Validator;
use Auth;
use Datatables;

class jabatanController extends Controller
{
    public function getTambahJabatan()
    {
        $jabatan = Jabatan::all();
        return view('jabatan.tambah', compact('jabatan'));
    }

    public function postTambahJabatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required',
        ]);

        $request['created_by'] = Auth::user()->id;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->only(['nama_jabatan']);
        Jabatan::create($input);
        return redirect('jabatan/list-jabatan');
    }

    public function getListJabatan($value='')
    {
        return view('jabatan.list');
    }

    public function getAjaxListJabatan($value='')
    {
        $jabatan = Jabatan::all();
        return Datatables::of($jabatan)
            ->addColumn('action', function($jabatan){
               return '<a href="'.route('edit-jabatan').'/'.$jabatan->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="'.route('hapus-personil').'/'.$jabatan->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })        
            ->make(true);
    }

}
