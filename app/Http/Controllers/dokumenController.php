<?php

namespace App\Http\Controllers;

use App\models\Jra_dokumen;
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
use App\Models\Saplog;

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

    function __construct() {
        $this->papi = new Papi;
        $this->id_role_user = Auth::user()->role_user_id;
    }

    private function cekRole(){
//        $role_user = Auth::user()->role_user->nama_role;
        switch ($this->id_role_user) {
            case '1':
                return 'admin';
                break;
            case '2':
                return 'user';
                break;
            case '4':
                return 'procurement';
                break;
            case '5':
                return 'logistik';
                break;
            case '6':
                return 'warehouse';
                break;
            case '7':
                return 'accounting';
                break;
            default:
                return redirect('/');
                break;
        }
    }


    public function getUpload(Request $request)
    {
        $role = $this->cekRole();
        $actifity = '';
        $view ='';
        $unit_id = $request->input('unit');
        $sap_log = Saplog::where('status', 'A')->firstOrFail();

        $array = ['asal_surat', 'actifity', 'jenis_dokumen', 'kode_jra', 'pr', 'po', 'cd', 'gr', 'file_pdf', 'unit_tujuan', 'lokasi_file', 'visibility'];

        if ( \Gate::allows('upload-cek', 'admin') ) {
            if ($request->input('unit')!=null) {
                $unit = unit::where('id', $unit_id)->where('id','!=', '1')->get();
            }else{
                $unit = unit::where('id','!=', '1')->get();
            }
            $actifity = Actifity::all();
            $unit_tujuan = unit::all();
            $visibility = Visibility::all();
        }else{
            $unit = unit::where('id', Auth::user()->personil->unit->id)->get();
            $unit_tujuan = unit::all();
            $actifity = Actifity::where('unit_id', Auth::user()->personil->unit->id)->get();
            $visibility = Visibility::all();
        }


        return view('dokumen/upload', compact('array', 'unit', 'visibility', 'actifity', 'unit_tujuan', 'sap_log'));
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getDetail($id='', $no_sap='')
    {
        if($id === '') return redirect("folder");

        $dokumen = Dokumen::with('sub_jenis_dokumen', 'asal_surat', 'tujuan_surat', 'dokumen_sap', 'dokumen_tembusan', 'jra_dokumen' )
            ->where('id', $id)
            ->orWhere('no_dokumen', $id)
            ->firstOrFail();

        if ( \Gate::denies('view-dokumen', $dokumen) ) {
            \Session::flash('alert-warning', 'Maaf anda tidak ada akses untuk melihat dokumen');
            return redirect('/pencarian?type=file_pdf&q=');
        }

        if ($no_sap != ''){
            $no_sap = $no_sap;
        }else{
            $no_sap = $dokumen->dokumen_sap->no_sap;
        }

        $type = $dokumen->dokumen_sap->type;

        $link = $this->link_dokumen($type, $no_sap);

        $dokumen_with_pr = $link['dok_pr'];
        $dokumen_with_po = $link['dok_po'];
        $no_pr = $link['no_pr'];
        $no_po = $link['no_po'];

        $detail_no_sap = Dokumen_sap::where('dokumen_id', $dokumen['id'])->get();

        $actifity_all = Actifity::all();
        $sub_jenis_all = Sub_jenis_dokumen::all();

        $unit_po = Unit::where('id','=',22)
            ->orWhere('id','=',23)
            ->orWhere('id','=',19)
            ->orWhere('id', 25)
            ->orWhere('id', 20)->get();

        return view('dokumen.detail', compact('no_pr', 'no_po', 'dokumen', 'actifity_all', 'sub_jenis_all', 'dokumen_with_pr', 'dokumen_with_po', 'actifity_list', 'unit_po', 'detail_no_sap'));
    }

    /**
     * pencarian detail dari koument dengan input type sap dan no_sap
     * @param $type
     * @param $no_sap
     * @return dok_pr, dok_po, no_pr, no_po
     */
    private function link_dokumen($type, $no_sap){
        $dokumen_with_pr = [];
        $dokumen_with_po = [];
        if ($type === null){
            $dokumen_with_pr = Dokumen::dokumenSAP('pr',$no_sap)->get();
            $dokumen_with_po = Dokumen::dokumenSAP('po',$no_sap)->get();
        }elseif($type === 'pr'){
            $no_po = Sap::select('purchase_order as po')
                ->where('purchase_requisition', $no_sap)
                ->where('purchase_order', '!=', 'null')
                ->groupBy('purchase_order')
                ->get();

            $no_pr = (object) [(object) [ 'pr' => $no_sap] ];

            foreach ($no_po as $key => $value) {

                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')
                    ->where('purchase_order', $value->po)
                    ->where('good_receipt','!=','null')
                    ->groupBy('good_receipt')
                    ->get();
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

            $no_pr = Sap::select('purchase_requisition as pr')
                ->where('purchase_order', $no_sap)
                ->where('purchase_requisition' , '!=', 'NULL')
                ->groupBy('purchase_requisition')
                ->get();
            foreach ($no_pr as $key => $value) {
                $dok_no_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
                $dokumen_with_pr = array_merge($dokumen_with_pr, $dok_no_pr);
            }

            $no_gr = Sap::select('good_receipt as gr')
                ->where('purchase_order', $no_sap)
                ->where('good_receipt','!=','null')
                ->groupBy('good_receipt')
                ->get();
            foreach ($no_gr as $key => $value) {
                $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
            }

            $no_cd = Sap::select('clearing_doc as gr')
                ->where('purchase_order', $no_sap)
                ->where('clearing_doc','!=', 'null')
                ->groupBy('clearing_doc')
                ->get();
            foreach ($no_cd as $key => $value) {
                $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
            }
        }elseif($type === 'cd'){
            $no_po = Sap::select('purchase_order as po')
                ->where('clearing_doc', $no_sap)
                ->groupBy('clearing_doc')
                ->get();

            $no_cd = (object) [(object) [ 'cd' => $no_sap] ];

            foreach ($no_po as $key => $value) {

                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')
                    ->where('purchase_order', $value->po)
                    ->where('good_receipt','!=', 'null')
                    ->groupBy('good_receipt')
                    ->get();

                $no_pr = Sap::select('purchase_requisition as pr')
                    ->where('purchase_order', $value->po)
                    ->where('purchase_requisition' , '!=', 'NULL')
                    ->groupBy('purchase_requisition')
                    ->get();

                foreach ($no_pr as $key => $value) {
                    $dok_no_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
                    $dokumen_with_pr = array_merge($dokumen_with_pr, $dok_no_pr);
                }

                foreach ($no_cd as $key => $value) {
                    $dok_no_cd = Dokumen::dokumenSAP('cd', $value->cd)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_cd);
                }

                $no_gr = Sap::select('good_receipt as gr')
                    ->where('purchase_order', $no_sap)
                    ->groupBy('good_receipt')
                    ->get();
                foreach ($no_gr as $key => $value) {
                    $dok_no_gr = Dokumen::dokumenSAP('gr', $value->gr)->get();
                    $dokumen_with_po = array_merge($dokumen_with_po, $dok_no_gr);
                }
            }
        }elseif($type === 'gr'){

            $no_po = Sap::select('purchase_order as po')
                ->where('good_receipt', $no_sap)
                ->groupBy('good_receipt')
                ->get();

            $no_gr = (object) [(object) [ 'gr' => $no_sap] ];

            foreach ($no_po as $key => $value) {

                $dok_po = Dokumen::dokumenSAP('po', $value->po)->get();
                $dokumen_with_po = array_merge($dokumen_with_po, $dok_po) ;
                $no_gr = Sap::select('good_receipt as gr')
                    ->where('purchase_order', $value->po)
                    ->groupBy('good_receipt')
                    ->get();

                $no_pr = Sap::select('purchase_requisition as pr')
                    ->where('purchase_order', $value->po)
                    ->where('purchase_requisition' , '!=', 'NULL')
                    ->groupBy('purchase_requisition')
                    ->get();
                // echo($no_pr);
                foreach ($no_pr as $key => $value) {
                    $dok_no_pr = Dokumen::dokumenSAP('pr', $value->pr)->get();
                    $dokumen_with_pr = array_merge($dokumen_with_pr, $dok_no_pr);
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
        $data['no_pr'] = $no_pr;
        $data['no_po'] = $no_po;
        $data['dok_pr'] = $dokumen_with_pr;
        $data['dok_po'] = $dokumen_with_po;

        return $data;
    }

    public function getSubJenis(Request $request)
    {
        $id_induk = $request['id'];
        $sub_jenis = Sub_jenis_dokumen::select('id', 'nama_sub')
            ->where('induk_jenis_dokumen', $id_induk)
            ->get();
        echo $sub_jenis;
    }

    public function postUpload(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'file_pdf' => 'required|mimes:pdf',
            'jenis_dokumen' => 'required',
            'kode_jra' => 'required'
        ]);

        if($validator->fails()){
            \Session::flash('alert-warning', 'Lengkapi Kembali Input Sebelum Upload');
            return redirect()->back();
        }

        $data['pr']= '';
        $data['po']= '';
        $data['gr']= '';
        $data['cd']= '';
        $data['checklist_id'] = '';

        $file = $request->file('file_pdf');

        $data = array_merge($data, $request->all());


        $jra_dokumen_id = Jra_dokumen::select('id')
            ->where('kode', $data['kode_jra'])
            ->firstOrFail(); //id untuk jra_dokumen

        $data['jra_dokumen_id'] = $jra_dokumen_id->id; //id jra
        $data['created_by'] = Auth::user()->id; //created_by
        $data['file_name_pdf'] = $file->getClientOriginalName();
       
        $filename = $this->fileRename($data['file_name_pdf']);
        $data['no_dokumen'] = $filename['no_file'];
        
        $validator = Validator::make($data, [
            'no_dokumen' => 'unique:dokumen|max:255',
            'jra_dokumen_id' => 'required'
        ]);

        if($validator->fails()){
            $url = url("dokumen/detail/$data[no_dokumen]");
            \Session::flash('alert-info', "No Dokumen <a href='$url'>$data[no_dokumen]</a> Sudah ada");
            return redirect()->back();
        }

        $data['nama_dokumen'] = $filename['nama_file'];
        $data['status_id'] = $this->status_id;
        $data['sub_jenis_id'] = $data['jenis_dokumen'];
        $data['visibility_id'] = $data['visibility'];
        $data['lokasi_file_pdf'] = $this->lokasi_file($data);
        $data['status_dokumen_id'] = '2';

        $data['unit_tujuan'] = (isset($data['tembusan']) && $data['unit_tujuan']!='') ? $data['unit_tujuan'] : null ;
        $data['tembusan'] = (isset($data['tembusan'])) ? $data['tembusan'] : null ;

       // dd($data);

        // if($data['pr']!=''){
        //     $this->cekWBS($data['pr']);
        // }

        $dokumen = Dokumen::create($data);
        
        if ($data['checklist_id'] != '') {
            $dokumen->has_checklist()->attach($data['checklist_id']);
        }
        //dokumen pengadaan
        $this->insertDokumenPRPO($dokumen, $data['pr'], $data['po'], $data['gr'], $data['cd']);
        $this->insertFolder($data, $dokumen);
        if ($data['tembusan']!= null) {
            $dokumen->dokumen_tembusan()->attach($data['tembusan']);
        }
        if($dokumen){
            $dataupload = $this->uploadfile($data, $file);
            return redirect("dokumen/detail/$dokumen->id");
        }
        \Session::flash('alert-error','Maaf, hanya akun Administrator yang berhak mengkases module tersebut.');
        return redirect()->back();
    }

    public function cekWBS($value)
    {
        $sap = Sap::select('wbs')
            ->where('purchase_requisition', $value)
            ->where('purchase_requisition', '!=', 'null')
            ->groupBy('wbs');
        return true;
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
            $file['nama_file'] = preg_replace('/-/', '/', $val[0]);
        }else{
            for ($i=1; $i < $no_a-1 ; $i++) { 
                $val[0] = $val[0].'_'.$val[$i];
            }
            $file['nama_file'] = preg_replace('/-/', '/', $val[0]);
        }
        $file['no_file'] = preg_replace('/\\.[^.\\s]{3,4}$/', '', end($val));
        return $file;
    }

    private function uploadfile($data, $file){
        Storage::disk('local')->put($data['lokasi_file_pdf'].'/'.$data['file_name_pdf'],  File::get($file));
    }
    
    private function lokasi_file($value){
        $unit_asal = unit::find($value['unit_asal']);
        $folder1 = $unit_asal['nama_unit'] ;
        $sub = Sub_jenis_dokumen::find($value['jenis_dokumen']);
        $folder2 = $sub['nama_sub'].'('.$sub['singkatan'].')';
        return $lokasi = $folder1.'/';
    }

    public function getFile($id){
        $data = Dokumen::with('sub_jenis_dokumen', 'asal_surat', 'tujuan_surat', 'dokumen_sap', 'dokumen_tembusan', 'jra_dokumen' )
            ->where('id', $id)
            ->orWhere('no_dokumen', $id)
            ->firstOrFail();

        if ( \Gate::denies('view-dokumen', $data) ) {
            return false;
        }

        $lokasi = $data->lokasi_file_pdf.$data->file_name_pdf;
        $file = Storage::disk('local')->get($lokasi);
        return  response($file, 200)
              ->header('Content-Type', 'application/pdf');
    }

    public function getTambahSapDokumen()
    {
        return view('dokumen.tambah_dokumen_sap');
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
            $sub_jenis = Sub_jenis_dokumen::select('id', 'nama_sub as text')->where('nama_sub', 'like' ,"%$q%")->where('actifity_id', $actifity)->orWhere('singkatan', "%$q%")->get();
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
            $dataSql = Dokumen::where('unit_asal', Auth::user()->personil->unit->id)->orWhere('unit_tujuan', '1')->get();
        }
        return Datatables::of($dataSql)
            ->addColumn('link_to_file', function($dataSql){
                return '<a href="'.url("dokumen/detail").'/'.$dataSql['id'].'">'.$dataSql['nama_dokumen'].'</a>' ;
            })
            ->addColumn('actifity', function($dataSql){
                return $dataSql->sub_jenis_dokumen->actifity->nama_actifity.' / '.$dataSql->sub_jenis_dokumen->nama_sub;
            })
            ->addColumn('no_sap', function($dataSql){
                return '<a href="'.url("dokumen/detail").'/'.$dataSql['id'].'">'.strtoupper($dataSql->dokumen_sap->type).': '.$dataSql->dokumen_sap->no_sap.'</a>';
            })
            ->addColumn('action', function($dataSql){
                return '<a href="'.url("dokumen/delete").'/'.$dataSql['id'].'" class="btn btn-warning btn-xs">Delete</a> <a href="'.url("dokumen/edit").'/'.$dataSql['id'].'" class="btn btn-info btn-xs">Edit</a>';
            })
            ->make(true);
    }

    public function getDelete($id='')
    {
        $dokumen = Dokumen::where('id', $id)->firstOrFail();
        Dokumen::where('id', $id)->delete();
        Storage::delete($dokumen['lokasi_file_pdf'].$dokumen['file_name_pdf']);
        return redirect('dokumen/list-file');
    }

    public function getEdit($id, Request $request)
    {
        $role = $this->cekRole();
        $unit_id = $request->input('unit');
        switch ($role) {
            case 'admin':
                $view = 'dokumen.upload_'.$role;
                $actifity = Actifity::all();
                if ($request->input('unit')!=null) {
                    $unit = unit::where('id', $unit_id)->get();
                }else{
                    $unit = unit::all();
                }
                $unit_tujuan = unit::all();
                $visibility = Visibility::all();
                break;

            case 'user':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::where('id', Auth::user()->unit->unit_id)->get();
                $unit_tujuan = unit::all();
                $actifity = Actifity::where('unit_id', 1)->get();
                $visibility = Visibility::all();
                break;

            case 'procurement':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::where('id', 19)->get();
                $unit_tujuan = unit::all();
                $actifity = Actifity::where('unit_id', 19)->get();
                $visibility = Visibility::all();
                break;

            case 'warehouse':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::where('id', $unit_id)->get();
                $unit_tujuan = unit::all();
                $actifity = Actifity::where('unit_id', 23)->get();
                $visibility = Visibility::all();
                break;

            case 'accounting':
                $view = 'dokumen.upload_'.$role;
                $unit = unit::where('id', $unit_id)->get();
                $unit_tujuan = unit::all();
                $actifity = Actifity::where('unit_id', 25)->get();
                $visibility = Visibility::all();
                break;

            default:
                break;
        }
        $dokumen = Dokumen::where('id', $id)->firstOrFail();
        return view('dokumen.edit', compact('dokumen','unit', 'visibility', 'view', 'actifity', 'unit_tujuan'));
    }

    public function getSap($type, $no_sap)
    {
        $link = $this->link_dokumen($type, $no_sap);

        $dokumen_with_pr = $link['dok_pr'];
        $dokumen_with_po = $link['dok_po'];
        $no_pr = $link['no_pr'];
        $no_po = $link['no_po'];

        $actifity_all = Actifity::all();
        $sub_jenis_all = Sub_jenis_dokumen::all();

        $unit_po = Unit::where('id','=',22)->orWhere('id','=',23)->orWhere('id','=',19)->orWhere('id', 25)->orWhere('id', 20)->get();
        return view('dokumen.sap', compact('no_pr', 'no_po', 'dokumen', 'actifity_all', 'sub_jenis_all', 'dokumen_with_pr', 'dokumen_with_po', 'actifity_list', 'unit_po'));
    }

    public function getVerify($id=''){
        $dokumen = Dokumen::Where("id", $id )->firstOrFail();
        $dokumen->status_dokumen_id = '1';
        $dokumen->save();
        return redirect()->back();
    }

    public function getTambahNoSap(Request $request)
    {
        $sap_type = ['po','pr', 'gr', 'cd'];
        $data['dokumen_id'] = $request->input('id');
        $data['jenis_dokumen_id'] = "1";

        foreach ($sap_type as $value){
            if($request->input($value) != null || $request->input($value) != '') {
                $validator = Validator::make($request->all(), [
                    $value => 'unique:dokumen_sap,no_sap,NULL,id,dokumen_id,'.$data['dokumen_id']
                ]);

                if($validator->fails()){
                    \Session::flash('alert-warning', 'Gagal menambahkan, No '.strtoupper($value).' sudah ada!');
                    return redirect()->back();
                }
            }
        }
        

        foreach ($sap_type as $value){
            if($request->input($value) != null || $request->input($value) != ''){
                $data['no_sap'] = $request->input($value);
                $data['type'] = $value;
            }
        }
        Dokumen_sap::create($data);
        return redirect("dokumen/detail/".$data['dokumen_id']);
    }

    public function getModalUpload(Request $request)
    {
        $jenis_id = $request->input('jenis');
        $checklist_id = $request->input('checklist');
        $unit_id = $request->input('unit');
        $actifity_id = $request->input('actifity');

        $actifity = Actifity::where('id', $actifity_id)->firstOrFail();
        $unit = unit::where('id', $unit_id)->firstOrFail();
        $jenis = Sub_jenis_dokumen::where('id', $jenis_id)->firstOrFail(); 
        $unit_tujuan = unit::all();
        $visibility = Visibility::all();
        // dd($unit);
        return view('checklist._upload-dokumen-modal', compact('jenis_id', 'jenis', 'checklist_id', 'actifity', 'unit', 'unit_tujuan', 'visibility'));
    }

    public function getTestDokumen()
    {

        $dokumen = Dokumen::where("id", 1)->firstOrFail();
        if ( \Gate::denies('view-dokumen', $dokumen) ) {
            abort(404);
        }

        echo "string";

    }

}
