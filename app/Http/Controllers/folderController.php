<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Dokumen;

use Auth;

class folderController extends Controller
{

    public function getIndex($id='')
    {
        if (\App::environment('local')) {
            if ($id=='') {
                $folder = Folder::where('unit_id', Auth::user()->personil->unit->id)->where('folder_induk', null)->get();
                // $breadcumb[0] = Auth::user()->personil->unit->nama_unit;
            }else {
                $folder = Folder::where('unit_id', Auth::user()->personil->unit->id)->where('folder_induk', $id)->get();
            }
            $file = $this->getFilePengadaan($id);
            return view('folder.listing', compact('folder', 'id', 'breadcumb', 'file'));
    	}else{
            return view('folder.production');
        }
    }

    private function getFilePengadaan($id='')
    {
        $dokumen = Dokumen::whereHas('folder', function($q) use ($id){
            $q->where('unit_id', Auth::user()->personil->unit->id)
            ->where('id', $id);
        })
        ->where('unit_asal', Auth::user()->personil->unit->id)->get();
        return $dokumen;
    }

    public function getTest($value='')
    {
        $dokumen = Dokumen::all();
        foreach ($dokumen->folder as $value) {
            dd($value->nama_folder);
        }
    }

    //user lain masih bisa create folder dengan indexs induk folder 
    // yang bukan unitnya jadi ada folder yang akan hilang
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
