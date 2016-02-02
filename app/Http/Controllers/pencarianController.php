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
    	$dokumen = ($input !== '') ? $this->cariFiles($input) : '' ;
    	$folder = ($input !== '') ? $this->cariFolders($input) : '' ;
    	// var_dump($dokumen);
    	if ($dokumen != [] || $dokumen != '' ) {
    		$include = '_include.hasil-pencarian';
    	}else{
    		$include = '_include.fail-pencarian';
    	}
    	return view('pencarian', compact('dokumen', 'include', 'input'));
    }

    private function cariFiles($input)
    {
		$dokumen = Dokumen::findGlobal($input)->get();
    	return $dokumen;
	}

    public function cariFolders($input)
    {
    	# code...
    }
}
