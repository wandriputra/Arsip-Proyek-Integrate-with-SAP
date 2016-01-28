<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Jenis_dokumen as jenis;
use App\Models\Unit as unit;
use App\Models\Level_dokumen;
use App\Models\Sub_jenis_dokumen;
use App\Models\Visibility;
use App\Models\Dokumen;
use App\Models\Dokumen_pr;
use App\Models\Dokumen_po;
use App\Models\Folder;

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
        $sub_jenis = Sub_jenis_dokumen::all();
        $visibility = Visibility::all();
        return view('dokumen/upload', compact('jenis_dokumen', 'unit', 'sub_jenis', 'visibility'));
    }

    public function getDetail($id='', $pr='', $po='')
    {
        if($id === '') return redirect("folder");
        $dokumen = Dokumen::find($id)->firstOrFail();
        $sub_jenis = Sub_jenis_dokumen::all();
        
        $user_sebelum_pengadaan = Level_dokumen::find('1')->sub_jenis_dokumen()->get();
        $user_setelah_pengadaan = Level_dokumen::find('2')->sub_jenis_dokumen()->get();
        $procurement = Level_dokumen::find('3')->sub_jenis_dokumen()->get();
        $log_wh = Level_dokumen::find('4')->sub_jenis_dokumen()->get();
        $accounting = Level_dokumen::find('5')->sub_jenis_dokumen()->get();

        return view('dokumen.detail', compact('dokumen', 'sub_jenis', 'user_sebelum_pengadaan', 'user_setelah_pengadaan','procurement', 'log_wh', 'accounting'));
    }

    public function getSubJenis(Request $request)
    {
        $id_induk = $request['id'];
        $sub_jenis = Sub_jenis_dokumen::select('id', 'nama_sub')->where('induk_jenis_dokumen', $id_induk)->get();
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

        $dokumen = Dokumen::create($data);

        //dokumen pengadaan
        $this->insertDokumenPRPO($dokumen, $data['pr'], $data['po']);
        $this->insertFolder($data, $dokumen);

        if($dokumen){
            $dataupload = $this->uploadfile($data, $file);
            return redirect("dokumen/detail/$dokumen->id");
        }
        return redirect()->back();
    }

    private function insertDokumenPRPO($value='', $pr='', $po='')
    {
        $data['dokumen_id'] = $value->id;
        $data['pr'] = $pr;
        $data['po'] = $po;
        if ($po!='') {
            $po = Dokumen_po::create($data);
            return true; 
        }elseif($pr!=''){
            $pr = Dokumen_pr::create($data);
            return true;
        }
    }

    private function folder_exist($data='')
    {
        $folder =  Folder::where('unit_id', $data['unit_id'])->where('nama_folder', $data['nama_folder'])->get();
        foreach ($folder as $key => $value) {
            $id = $value->id;
            return $id;
        }
        return false;
    }

    private function folder_induk($data='')
    {
        $folder =  Folder::where('nama_folder', 'Dokumen Pengadaan')->where('unit_id', $data['unit_id'])->get();
        foreach ($folder as $key => $value) {
            $id = $value->id;
            return $id;
        }
        return false;
    }

    private function insertFolder($value='', $dokumen='')
    {
        $data['unit_id'] = $value['asal_surat'];
        $data['nama_folder'] = Sub_jenis_dokumen::where('id',$value['sub_jenis_id'])->firstOrFail()->nama_sub;
        $data['created_by'] = $value['created_by'];
        
        $folder = $this->folder_exist($data);
        $folder_atasan = $this->folder_induk($data);
        
        if($folder_atasan == false){
            $data['nama_folder'] = "Dokumen Pengadaan";
            $atasan = Folder::create($data);
            $folder_atasan = $atasan->id;
        }

        //true
        if($folder == false){
            $data['folder_induk'] = $folder_atasan;
            $data['nama_folder'] = Sub_jenis_dokumen::where('id',$value['sub_jenis_id'])->firstOrFail()->nama_sub;
            $folder = Folder::create($data);
        }

        $dokumen->folder()->attach($folder);
        return true;
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
        $sub = Sub_jenis_dokumen::find($value['sub_jenis_dokumen']);
        $folder2 = $sub['nama_sub'].'('.$sub['singkatan'].')';
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
