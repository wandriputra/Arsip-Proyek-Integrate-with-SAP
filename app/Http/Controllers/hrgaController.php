<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Sap;
use App\Models\Saplog;
use App\Models\Module;
use App\Models\Role_user;

use File;
use Illuminate\Support\Facades\Auth;
use Storage;
use Excel;
use Artisan;
use Schema;
use DB;
use Datatables;

class hrgaController extends Controller
{
	public $data = 0;
    public $create_table = true;


    public function getUploadExcel($value='')
    {
        return view('hrga.upload_excel');
    }

    public function postUploadExcel(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'format1' => 'required',
        ]);

        if($validator->fails()){
            \Session::flash('alert-warning', 'Upload File ZPC dengan format CSV');
            return redirect()->back();
        }
    	$file = $request->file('format1');

        if (Schema::hasTable('sap_')) {
            Schema::drop('sap_');
        }

        $file_csv = fopen($file->getPathName(), 'r');
        $header = fgetcsv($file_csv, ',');
        $header = $this->renameData($header);
        $header = $this->cekDuplicate($header);
//        dd($header);

        if (!Schema::hasTable('sap_')) {
            Schema::create('sap_', function (Blueprint $table) use ($header){
                $table->increments('id');
                $rep = [' ', '.'];
                foreach($header as $key => $value) {
                    $val = str_replace($rep, '_', $value);
                    $table->string(strtolower($val))->nullable();
                }
            });
        }

        $count = 0;
        while ($line = fgetcsv($file_csv, ',')){
            $count++;
            for ($i=0; $i<count($header); $i++){
                if ($line[$i]===''){
                    $line[$i] = null;
                }
                $data[$header[$i]] = $line[$i];
            }
            DB::table('sap_')->insert($data);
        }


        $storage1['lokasi_file'] = "file_zpc";
        $storage['file_name'] = $file->getClientOriginalName();
        $storage['jumlah_row'] = $count+1;
        $storage['status'] = 'A';
        $storage['created_by'] = Auth::user()->id;

//        $cek = Saplog::where('file_name',  $storage['file_name'])->firstOrFail();
//        if ($cek){
//            $storage['file_name']= $storage['file_name'].'_rev1.csv';
//        }
        Saplog::where('status', 'A')->update(array('status' => 'N'));
        Saplog::create($storage);

        Storage::disk('local')->put($storage1['lokasi_file'].'/'.$storage['file_name'],  File::get($file));

        return redirect('hrga/view-upload-data');
    }

    // cek duplicate file
    private function cekDuplicate($array){
        $count = count($array);

        for($i = 0; $i < $count; $i++){
            $numbering = 0;
            for($j = $i + 1; $j < $count; $j++){
                if($array[$i] == $array[$j]){
                    $array[$j] = $array[$j].'_'.++$numbering;
                }
            }
        }
        return $array;
    }

    //rename data header untuk database
    private function renameData($array){
        $count = count($array);
        $rep1 = [' ', '.', '('];
        $rep2 = ['/', ')'];
        $rep3 = ['__'];

        for($i = 0; $i < $count; $i++) {
            $array[$i] = strtolower(str_replace($rep1, '_', $array[$i]));
            $array[$i] = str_replace($rep2, '', $array[$i]);
            $array[$i] = str_replace($rep3, '_', $array[$i]);
        }
        return $array;
    }

    public function getViewUploadData()
    {
        return view('hrga.view_data');
    }

    public function getAjaxFileUpload()
    {
        $dataSql = DB::table('sap_')
            ->select('*')
            ->whereNotNull('purchase_requisition');
        return Datatables::of($dataSql)
            ->addColumn('wbs_element', function($dataSql){
                return $dataSql->wbs_element.' / '.$dataSql->description;
            })
            ->addColumn('net_price', function($dataSql){
                return $dataSql->currency_key.' '.number_format($dataSql->net_price);
            })
            ->make(true);
    }

    public function getDetailSap($type='', $no_sap='')
    {
        $var = $this->type_sap($type);
        $detail = Sap::select('id', 'purchase_order as po', 'purchase_requisition as pr', 'short_text', 'description', 'wbs_element as wbs')
            ->where($var, $no_sap)
            ->get();

        return view('hrga.detail', compact('detail'));
    }

    public function getAjaxSelectSap(Request $request)
    {
        $q = $request->get('q');
        $var = $this->type_sap($request->get('type'));
        if($q!='' && $var !=''){
            $sap = Sap::where($var, "like", "%$q%")->groupBy($var)->select("$var as id", "$var as text")->limit('10')->get();
            return response()->json($sap);
        }
        return [];
        
    }

    private function type_sap($type='')
    {
        switch ($type) {
            case 'po':
                $var = 'purchase_order';
                break;
            case 'pr':
                $var = 'purchase_requisition';
                break;
            case 'gr':
                $var = 'good_receipt';
                break;
            case 'cd':
                $var = 'clearing_doc';
                break;
            default:
                # code...
                break;
        }
        return $var;
    }

    public function getListZpc()
    {
        $data = Saplog::select('*')->orderBy('status', 'desc')->simplepaginate('10');
        return view('hrga.list_zpc', compact('data'));
    }

    public function getRoleModule()
    {
        $role = Role_user::all();
        $module = Module::all();
        return view('hrga.list-module', compact('module', 'role'));
    }

    public function getUpdateModule(Request $request)
    {
        $data = $request->all();
        $i = 0;
        $role = Role_user::find($data['role_user']);

        if (isset($data['semua_module'])){
            $module = Module::all();
            foreach ($module as $value){
                $upload[$i]['module_id'] = $value->id;
                $i++;
            }
        }else{
            foreach ($data as $key => $value){
                if(substr($key, 0, 2)=='x_') {
                    $upload[$i]['module_id'] = substr($key, 2);
                    $i++;
                }
            }
        }

        $role_1 = Role_user::where('id',$data['role_user'])->with('module_user')->firstOrFail()->toArray();

        $array_user = $upload;
        $array_db = $role_1['module_user'];

//        dd($array_user);

        $i = 0;
        foreach ($array_user as $value){
            $collection = collect($array_db);
            $bool = $collection->contains($value['module_id']);
            if ($bool == false){
                $role->module_user()->attach($value['module_id'], ['created_by' => Auth::user()->id]);
            }
            $i++;
        }

        $i = 0;
        foreach ($array_db as $value){
            $collection = collect($array_user);
            $bool = $collection->contains($value['id']);
            if ($bool == false){
                $role->module_user()->detach($value['id']);
            }
            $i++;
        }

//        if(count($role_1['module_user']) >  count($upload)){
//            for ($i=0; $i<count($role_1['module_user']); $i++){
//                if($role_1['module_user'][$i]['id'] != $upload[$i]['module_id'] ){
//                    $role->module_user()->detach($upload[$i]['module_id']);
//                }
//            }
//
//        }elseif(count($role_1['module_user']) >  count($upload)){
//            echo 'lebih besar';
//        }

        $role->module_user()->attach($upload, ['created_by' => Auth::user()->id]);

        return redirect('hrga/role-module');
    }


    
}
