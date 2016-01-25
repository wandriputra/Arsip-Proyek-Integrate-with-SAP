<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen as jenis;
use App\Models\Unit as unit;
use App\Models\Sub_jenis_dokumen as sub_jenis;
use App\Models\Visibility;

class dokumenController extends Controller
{
    public function getUpload()
    {
        $jenis_dokumen = jenis::all();
        $unit = unit::all();
        $sub_jenis = sub_jenis::all();
        $visibility = Visibility::all();
        return view('dokumen/upload', compact('jenis_dokumen', 'unit', 'sub_jenis', 'visibility'));
    }

    public function getDetail($id='')
    {
        return view('dokumen.detail');
    }

    public function getFolder($value='')
    {
        return view('dokumen.folder');
    }

    public function getSubJenis(Request $request)
    {
        $id_induk = $request['id'];
        $sub_jenis = sub_jenis::select('id', 'nama_sub')->where('induk_jenis_dokumen', $id_induk)->get();
        echo $sub_jenis;
    }

    public function postUploadDokumen(Request $request)
    {
        $file = $request->file('file_pdf');
        $data = $request->all();
    }
}
