<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Dokumen;

class pencarianController extends Controller
{
    public function getIndex(){
    	$dokumen = Dokumen::all();
    	return view('pencarian', compact('dokumen'));
    }
}
