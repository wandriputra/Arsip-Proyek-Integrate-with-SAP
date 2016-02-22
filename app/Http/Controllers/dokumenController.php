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
use App\Models\Dokumen_sap;
use App\Models\Dokumen_po;
use App\Models\Folder;
use App\Models\Actifity;
use App\Models\Papi;
use App\Models\Sap;

use Auth;
use Validator;
use Storage;
use File;
use Response;
use Datatables;
use DB;


class dokumenController extends Controller
{
    private $status_id = '1'; //dokumen belum di hapus
    private $papi;
    protected $id_role_user;

    function __construct($foo = null) {
        $this->papi = new Papi;
    }

    private function cekRole(){
        $role_user = Auth::user()->role_user->nama_role;
        $this->id_role_user = Auth::user()->role_user_id;
        switch ($this->id_role_user) {
            case '1':
                return 'admin';
                break;
            case '2':
                return 'user';
                break;
            case '7':
                return 'hrga';
                break;
            case '8':
                return 'procurement';
                break;
            case '9':
                return 'logistik';
                break;
            case '10':
                return 'warehouse';
                break;
            case '11':
                return 'accounting';
                break;
            default:
                return redirect('/');
                break;
        }
    } 

    public function getUpload()
    {
        $role = $this->cekRole();
        $actifity = '';
        $sub_jenis = '';
        $view ='';
        $gr = '';
        $cd ='';
        switch ($role) {
            case 'admin':
                $view = 'dokumen.upload_'.$role;
                $actifity = Actifity::all();
                $unit = unit::all();
                // $sub_jenis = Sub_jenis_dokumen::all();
                $visibility = Visibility::all();
                // $pr = Sap::select('purchase_requisition as pr')->groupBy('purchase_requisition')->get();
                // $po = Sap::select('purchase_order as po')->groupBy('purchase_order')->get();
                // $gr = Sap::select('good_receipt as gr')->groupBy('good_receipt')->get();
                // $cd = Sap::select('clearing_doc as cd')->groupBy('clearing_doc')->get();
                break;

            case 'user':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::all();
                $actifity = Actifity::where('unit_id', 1)->get();
                // $sub_jenis = Sub_jenis_dokumen::where('actifity_id', 0)->get();
                $visibility = Visibility::all();
                // $pr = Sap::select('purchase_requisition as pr')->groupBy('purchase_requisition')->get();
                break;

            case 'procurement':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::all();
                $actifity = Actifity::where('unit_id', 19)->get();
                // $sub_jenis = Sub_jenis_dokumen::where('actifity_id', 0)->get();
                $visibility = Visibility::all();
                // $pr = Sap::select('purchase_requisition as pr')->groupBy('purchase_requisition')->get();
                // $po = Sap::select('purchase_order as po')->groupBy('purchase_order')->get();
                break;

            case 'warehouse':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::all();
                $actifity = Actifity::where('unit_id', 23)->get();
                // $sub_jenis = Sub_jenis_dokumen::where('actifity_id', 0)->get();
                $visibility = Visibility::all();
                // $gr = Sap::select('good_receipt as gr')->groupBy('good_receipt')->get();
                break;

            case 'accounting':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::all();
                $actifity = Actifity::where('unit_id', 25)->get();
                // $sub_jenis = Sub_jenis_dokumen::where('actifity_id', 0)->get();
                $visibility = Visibility::all();
                // $cd = Sap::select('clearing_doc as cd')->groupBy('clearing_doc')->get();
                break;

            default:
                # code...
                break;
        }
        // dd($pr,$po);
        return view('dokumen/upload', compact('unit', 'visibility', 'view', 'actifity'));
    }

    public function getDetail($id='', $pr='', $po='')
    {
        if($id === '') return redirect("folder");
        $dokumen = Dokumen::where('id', $id)->firstOrFail();
        $no_sap = $dokumen->dokumen_sap->no_sap;
        $type = $dokumen->dokumen_sap->type;
        $dokumen_with_pr = [];
        $dokumen_with_po = [];

        if ($type === null){
            $dokumen_with_pr = Dokumen::dokumenSAP('pr',$no_sap)->get();
            $dokumen_with_po = Dokumen::dokumenSAP('po',$no_sap)->get();;
        
        }elseif($type === 'pr'){
            $no_po = Sap::select('purchase_order as po')->where('purchase_requisition', $no_sap)->groupBy('purchase_order')->get();
            
            $no_pr = (object) [(object) [ 'pr' => $no_sap] ];
            
            foreach ($no_po as $key => $value) {
                
                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')->where('purchase_order', $value->po)->where('good_receipt','!=','null')->groupBy('good_receipt')->get();
                foreach ($no_gr as $key => $value) {
                    $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                    if(count($dok_no_gr)!=0){
                        $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
                    }
                }

                $no_cd = Sap::select('clearing_doc as cd')->where('purchase_order', $value->po)->where('clearing_doc','!=', 'null')->groupBy('clearing_doc')->get();
                foreach ($no_cd as $key => $value) {
                    $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
                }
            }

            $dokumen_with_pr = Dokumen::dokumenSAP('pr', $no_sap)->get();
        
        }elseif ($type === 'po'){

            $no_po = (object) [(object) [ 'po' => $no_sap] ];

            $dokumen_with_po = Dokumen::dokumenSAP('po', $no_sap)->get();

            $no_pr = Sap::select('purchase_requisition as pr')->where('purchase_order', $no_sap)->where('purchase_requisition' , '!=', 'NULL')->groupBy('purchase_requisition')->get();
            foreach ($no_pr as $key => $value) {
                $dokumen_with_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
            }

            $no_gr = Sap::select('good_receipt as gr')->where('purchase_order', $no_sap)->where('good_receipt','!=','null')->groupBy('good_receipt')->get();
            foreach ($no_gr as $key => $value) {
                $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
            }

            $no_cd = Sap::select('clearing_doc as gr')->where('purchase_order', $no_sap)->where('clearing_doc','!=', 'null')->groupBy('clearing_doc')->get();
            foreach ($no_cd as $key => $value) {
                $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
            }
        }elseif($type === 'cd'){
            $no_po = Sap::select('purchase_order as po')->where('clearing_doc', $no_sap)->groupBy('clearing_doc')->get();
            
            $no_cd = (object) [(object) [ 'cd' => $no_sap] ];
            
            foreach ($no_po as $key => $value) {
                
                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')->where('purchase_order', $value->po)->where('good_receipt','!=', 'null')->groupBy('good_receipt')->get();
                
                $no_pr = Sap::select('purchase_requisition as pr')->where('purchase_order', $value->po)->where('purchase_requisition' , '!=', 'NULL')->groupBy('purchase_requisition')->get();
                
                foreach ($no_pr as $key => $value) {
                    $dokumen_with_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
                }

                foreach ($no_cd as $key => $value) {
                    $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
                }

                $no_gr = Sap::select('good_receipt as gr')->where('purchase_order', $no_sap)->groupBy('good_receipt')->get();
                foreach ($no_gr as $key => $value) {
                    $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
                }
            }
        }elseif($type === 'gr'){

            $no_po = Sap::select('purchase_order as po')->where('good_receipt', $no_sap)->groupBy('good_receipt')->get();
            
            $no_gr = (object) [(object) [ 'gr' => $no_sap] ];
            
            foreach ($no_po as $key => $value) {
                
                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')->where('purchase_order', $value->po)->groupBy('good_receipt')->get();
                
                $no_pr = Sap::select('purchase_requisition as pr')->where('purchase_order', $value->po)->where('purchase_requisition' , '!=', 'NULL')->groupBy('purchase_requisition')->get();
                // echo($no_pr);
                foreach ($no_pr as $key => $value) {
                    $dokumen_with_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
                }

                foreach ($no_gr as $key => $value) {
                    $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
                }

                $no_cd = Sap::select('clearing_doc as cd')->where('purchase_order', $value->po)->groupBy('clearing_doc')->get();
                foreach ($no_cd as $key => $value) {
                    $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
                }
            }

        }

        $actifity_all = Actifity::all();
        $sub_jenis_all = Sub_jenis_dokumen::all();

        $unit_po = Unit::where('id','=',22)->orWhere('id','=',23)->orWhere('id','=',19)->orWhere('id', 25)->orWhere('id', 20)->get();
        return view('dokumen.detail', compact('no_pr', 'no_po', 'dokumen', 'actifity_all', 'sub_jenis_all', 'dokumen_with_pr', 'dokumen_with_po', 'actifity_list', 'unit_po'));
    }

    public function getSubJenis(Request $request)
    {
        $id_induk = $request['id'];
        $sub_jenis = Sub_jenis_dokumen::select('id', 'nama_sub')->where('induk_jenis_dokumen', $id_induk)->get();
        echo $sub_jenis;
    }

    public function postUpload(Request $request)
    {
        $data['pr']= '';
        $data['po']= '';
        $data['gr']= '';
        $data['cd']= '';
        $file = $request->file('file_pdf');

        $data = array_merge($data, $request->all());
        

        $data['created_by'] = Auth::user()->id;
        $data['file_name_pdf'] = $file->getClientOriginalName();
       
        $filename = $this->fileRename($data['file_name_pdf']);

        $data['no_dokumen'] = $filename['no_file'];
        $data['nama_dokumen'] = $filename['nama_file'];
        $data['status_id'] = $this->status_id;
        $data['sub_jenis_id'] = $data['sub_jenis_dokumen'];
        $data['visibility_id'] = $data['visibility'];
        $data['lokasi_file_pdf'] = $this->lokasi_file($data);
        $data['status_dokumen_id'] = '1';

        $data['unit_tujuan'] = (isset($data['tembusan']) && $data['unit_tujuan']!='') ? $data['unit_tujuan'] : null ;
        $data['tembusan'] = (isset($data['tembusan'])) ? $data['tembusan'] : null ;

        // dd($data);
        $dokumen = Dokumen::create($data);

        //dokumen pengadaan
        $this->insertDokumenPRPO($dokumen, $data['pr'], $data['po'], $data['gr'], $data['cd']);
        $this->insertFolder($data, $dokumen);
        if ($data['tembusan']!= null) {
            // $i=0;
            // foreach ($data['tembusan'] as $key => $value) {
                $dokumen->dokumen_tembusan()->attach($data['tembusan']);
                // $i++;
            // }
        }
        if($dokumen){
            $dataupload = $this->uploadfile($data, $file);
            return redirect("dokumen/detail/$dokumen->id");
        }
        return redirect()->back();
    }

    private function insertDokumenPRPO($value='', $pr='', $po='', $gr='', $cd='')
    {
        $data['dokumen_id'] = $value->id;
        $data['jenis_dokumen_id'] = "1";
        if ($po!='') {
            $data['no_sap'] = $po;
            $data['type'] = 'po';
        }elseif($pr!=''){
            $data['no_sap'] = $pr;
            $data['type'] = 'pr';
        }elseif($gr!=''){
            $data['no_sap'] = $gr;
            $data['type'] = 'gr';
        }elseif($cd!=''){
            $data['no_sap'] = $cd;
            $data['type'] = 'cd';
        }
        Dokumen_sap::create($data);
        return true;
    }

    private function folder_exist($data='')
    {
        $folder =  Folder::where('unit_id', $data['nama_folder'])->where('nama_folder', $data['nama_folder'])->where('jenis_dokumen_id', '1')->get();
        foreach ($folder as $key => $value) {
            $id = $value->id;
            return $id;
        }
        return false;
    }

    private function folder_induk($data='')
    {
        $folder =  Folder::where('nama_folder', $data['nama_folder'])->where('unit_id', $data['unit_id'])->get();
        foreach ($folder as $key => $value) {
            $id = $value->id;
            return $id;
        }
        return false;
    }

    private function insertFolder($value='', $dokumen='')
    {
        $data['unit_id'] = $value['unit_asal'];
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
        $c = count($val);
        $no_a = $c - (int)end($val);
        if ($no_a <= 1) {
            $file['no_file'] = preg_replace('/-/', '/', $val[0]);
        }else{
            for ($i=1; $i < $no_a-1 ; $i++) { 
                $val[0] = $val[0].'_'.$val[$i];
            }
            $file['no_file'] = preg_replace('/-/', '/', $val[0]);
        }
        $file['nama_file'] = preg_replace('/\\.[^.\\s]{3,4}$/', '', end($val));
        return $file;
    }

    private function uploadfile($data, $file){
        Storage::disk('local')->put($data['lokasi_file_pdf'].'/'.$data['file_name_pdf'],  File::get($file));
    }
    
    private function lokasi_file($value){
        $unit_asal = unit::find($value['unit_asal']);
        $folder1 = $unit_asal['nama_unit'] ;
        $sub = Sub_jenis_dokumen::find($value['sub_jenis_dokumen']);
        $folder2 = $sub['nama_sub'].'('.$sub['singkatan'].')';
        return $lokasi = $folder1.'/'.$folder2.'/';
    }

    public function getFile($id){
        $data = Dokumen::where('id', $id)->firstOrFail();
        $lokasi = $data->lokasi_file_pdf.$data->file_name_pdf;
        $file = Storage::disk('local')->get($lokasi);
        return  response($file, 200)
              ->header('Content-Type', 'application/pdf');
    }

    public function getFolderPengadaan($value='')
    {
        return view('_include.folder_pencarian');
    }

    public function getAjaxActifity($unit_id)
    {
        if ($unit_id != 19 && $unit_id != 11 && $unit_id != 22 && $unit_id != 23 && $unit_id != 25) {
            $actifity = Actifity::select('id', 'nama_actifity')->where('unit_id', '1')->orWhere('unit_id', $unit_id)->get();
        }else {
            $actifity = Actifity::select('id', 'nama_actifity')->where('unit_id', $unit_id)->get();
        }
        return response()->json($actifity);
    }

    public function getAjaxSubJenisDokumen(Request $request)
    {
        $q = $request->get('q');
        $actifity = $request->get('act');
        if($q!='' && $actifity!=''){
            $sub_jenis = Sub_jenis_dokumen::select('id', 'nama_sub as text')->where('nama_sub', 'like' ,"%$q%")->where('actifity_id', $actifity)->orWhere('singkatan', 'like', "%$q%")->get();
            return response()->json($sub_jenis);
        }
        return [];
    }

    public function getListDokumen()
    {
        $file_unit = false;
        return view('dokumen.list_dokumen', compact('file_unit'));
    }

    public function getListFile()
    {
        $file_unit = true;
        return view('dokumen.list_dokumen', compact('file_unit'));
    }

    public function getAjaxListDokumen($unit='')
    {
        if ($unit==null) {
            $dataSql = Dokumen::all();
        }else{
            $dataSql = Dokumen::where('unit_asal', Auth::user()->personil->unit->id)->get();
        }
        return Datatables::of($dataSql)
            ->addColumn('link_to_file', function($dataSql){
                return '<a href="'.url("dokumen/detail").'/'.$dataSql['id'].'">'.$dataSql['no_dokumen'].'</a>' ;
            })
            ->addColumn('actifity', function($dataSql){
                return $dataSql->sub_jenis_dokumen->actifity->nama_actifity.' / '.$dataSql->sub_jenis_dokumen->nama_sub;
            })
            ->addColumn('no_sap', function($dataSql){
                return '<a href="'.url("dokumen/detail").'/'.$dataSql['id'].'">'.strtoupper($dataSql->dokumen_sap->type).': '.$dataSql->dokumen_sap->no_sap.'</a>';
            })
            ->make(true);
    }

    public function getEdit($id)
    {
        $dokumen = Dokumen::where('id', $id)->firstOrFail();
        return view('dokumen.edit', compact('dokumen'));
    }
}
