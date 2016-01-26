<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen as jenis;
use App\Models\Unit as unit;
use App\Models\Sub_jenis_dokumen as sub_jenis;
use App\Models\Visibility;
use App\Models\Dokumen;
use App\Models\Level_sub_jenis;

use Auth;
use Validator;
use Storage;
use File;
use Response;

class dokumenController extends Controller
{
    private $status_id = '1'; //dokumen belum di hapus

    public function getUpload()
    {
        $jenis_dokumen = jenis::all();
        $unit = unit::all();
        $sub_jenis = sub_jenis::all();
        $visibility = Visibility::all();
        return view('dokumen/upload', compact('jenis_dokumen', 'unit', 'sub_jenis', 'visibility'));
    }

    public function getDetail($id)
    {
        $dokumen = Dokumen::find($id)->firstOrFail();
        $level_sub = Level_sub_jenis::all();
        return view('dokumen.detail', compact('dokumen', 'level_sub'));
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

    public function postUpload(Request $request)
    {
        $file = $request->file('file_pdf');
        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        $data['file_name_pdf'] = $file->getClientOriginalName();
       
        $filename = $this->fileRename($data['file_name_pdf']);

        $data['no_dokumen'] = $filename['no_file'];
        $data['nama_dokumen'] = $filename['nama_file'];
        $data['status_id'] = $this->status_id;
        $data['sub_jenis_id'] = $data['sub_jenis_dokumen'];
        $data['visibility_id'] = $data['visibility'];
        $data['lokasi_file_pdf'] = $this->lokasi_file($data);
        $dataupload = $this->uploadfile($data, $file);
        $dokumen = Dokumen::create($data);

        return redirect("dokumen/detail/$dokumen->id");
    }

    private function fileRename($value)
    {
        $val = explode('_', $value);
        $file['no_file'] = preg_replace('/-/', '/', $val[0]);
        $file['nama_file'] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $val[1]);
        return $file;
    }

    private function uploadfile($data, $file){
        Storage::disk('local')->put($data['lokasi_file_pdf'].'/'.$data['file_name_pdf'],  File::get($file));
    }
    
    private function lokasi_file($value){
        $unit_asal = unit::find($value['asal_surat']);
        $folder1 = $unit_asal['nama_unit'] ;
        $sub = sub_jenis::find($value['sub_jenis_dokumen']);
        $folder2 = $sub['nama_sub'].'('.$sub['nama_sub'].')';
        return $lokasi = $folder1.'/'.$folder2.'/';
    }

    public function getFile($id){
        $data = Dokumen::where('id', $id)->firstOrFail();
        $lokasi = $data->lokasi_file_pdf.'/'.$data->file_name_pdf;
        $file = Storage::disk('local')->get($lokasi);
 
        return  response($file, 200)
              ->header('Content-Type', 'application/pdf');
    }
}
