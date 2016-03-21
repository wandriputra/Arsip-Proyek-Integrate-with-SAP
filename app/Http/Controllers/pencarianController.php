<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dokumen;
use App\Models\Dokumen_pr;
use App\Models\Dokumen_po;

class pencarianController extends Controller
{
    public function getIndex(Request $request){
    	$input = $request->input('q');
        $type = $request->input('type');
    	$dokumen = ($input !== '') ? $this->cariFiles($input) : '' ;
    	$folder = ($input !== '') ? $this->cariFolders($input) : '' ;
    	// var_dump($dokumen);
    	if ($dokumen != [] || $dokumen != '' && $folder != [] || $folder != '' && $input!= '') {
    		$include = '_include.hasil-pencarian';
    	}else{
    		$include = '_include.fail-pencarian';
    	}
    	return view('pencarian', compact('dokumen', 'include', 'input', 'folder', 'type'));
    }

    private function cariFiles($input)
    {
		$dokumen = Dokumen::findGlobal($input);
    	return $dokumen;
	}

    public function cariFolders($input)
    {
    	$folders = Dokumen::findSap($input);
        // $folders->setPath("?q=$input&");
        return $folders;
    }
}
