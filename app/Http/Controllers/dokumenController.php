<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\model\jenis_dokumen as jenis;
use App\model\unit as unit;

class dokumenController extends Controller
{
    public function getUpload()
    {
        $jenis_dokumena = jenis::all();
        $unit = unit::all();
        return view('dokumen/upload', array('jenis_dokumen' => $jenis_dokumena, 'unit'=>$unit));
    }

    public function getDetail($id='')
    {
        return view('dokumen.detail');
    }
}
