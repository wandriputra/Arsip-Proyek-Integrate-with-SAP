<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Folder;

use Auth;

class folderController extends Controller
{

    public function getIndex($id='')
    {
    	if ($id=='') {
    		$folder = Folder::where('unit_id', Auth::user()->personil->unit->id)->where('folder_induk', null)->get();
    		$breadcumb[0] = Auth::user()->personil->unit->nama_unit;
    	}else {
    		$folder = Folder::where('unit_id', Auth::user()->personil->unit->id)->where('folder_induk', $id)->get();
    	}
        return view('folder.listing', compact('folder', 'id', 'breadcumb'));
    }

    public function postNewFolder(Request $request)
    {
    	$data = $request->all();
    	$data['created_by'] = Auth::user()->id;
    	// var_dump($data);
    	if($data['folder_induk']===''){
    		$data['folder_induk'] = null;
    	}
    	$insert = Folder::create($data);

    	return redirect()->back();
    }

}
