<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Dokumen extends Model
{
    //
    use SoftDeletes;

	protected $table = 'dokumen';

	protected $fillable = ['no_dokumen', 'nama_dokumen', 'file_name_pdf', 'lokasi_file_pdf', 'tag_keterangan', 'sub_jenis_id', 'unit_asal', 'unit_tujuan', 'visibility_id', 'created_by', 'status_dokumen_id', 'jra_dokumen_id'];

	public static $rules = [
    	'jenis_dokumen' => 'required',
    	'sub_jenis_dokumen' => 'required',
    	'file_pdf' => 'required'
    ];

    protected $dates = ['deleted_at'];

    public function sub_jenis_dokumen()
    {
        return $this->belongsTo('App\Models\Sub_jenis_dokumen', 'sub_jenis_id');
    }

    public function asal_surat()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_asal');
    }
    
    public function tujuan_surat()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_tujuan');
    }

    public function folder()
    {
        return $this->belongsToMany('App\Models\Folder', 'folder_dokumen', 'dokumen_id', 'folder_id');
    }
//TODO: hasone change to has many to relation dokumen and sap
    public function dokumen_sap()
    {
        return $this->hasOne('App\Models\Dokumen_sap', 'dokumen_id');
    }

    public function dokumen_tembusan()
    {
        return $this->belongsToMany('App\Models\Unit', 'tembusan_dokumen', 'dokumen_id', 'unit_id');
    }

    public function jra_dokumen()
    {
        return $this->belongsTo('App\models\Jra_dokumen', 'jra_dokumen_id');
    }

    public function scopeFindGlobal($query, $key)
    {
        $dokumen = DB::table("dokumen")
            ->leftJoin("dokumen_sap", "dokumen.id", "=", "dokumen_sap.dokumen_id")
            ->where("file_name_pdf", "like", "%$key%")
            ->orWhere("no_sap" , "like", "%$key%")
            ->select('*', 'dokumen.id as id_dokumen')
            ->groupBy('dokumen.no_dokumen')
            ->paginate(5);
        return $dokumen;
    }

    public function scopeFindSap($query, $key)
    {
        $sap = DB::table('sap_')
            ->select('purchase_requisition as pr', 'short_text', 'clearing_doc as cd', 'purchase_order as po', 'good_receipt as gr')
            ->where('purchase_requisition', 'like', "%$key%")
            ->orWhere('clearing_doc', 'like', "%$key%")
            ->orWhere('purchase_order', 'like', "%$key%")
            ->orWhere('good_receipt', 'like', "%$key%")
            ->orWhere('short_text', 'like', "%$key%")
            ->orWhere('vendor', 'like', "%$key%")
            ->groupBy('purchase_order')
            ->paginate(12);
        return $sap;
    }

    public function scopeDokumenSAP($query, $type, $no_sap)
    {
        if($type == 'po' ){
            
            $dokumen_id = DB::table('dokumen')
                ->Join("dokumen_sap", "dokumen.id", "=", "dokumen_sap.dokumen_id")
                ->Join("sub_jenis_dokumen", "dokumen.sub_jenis_id", "=", "sub_jenis_dokumen.id")
                ->Join("actifity", "sub_jenis_dokumen.actifity_id", "=", "actifity.id")
                ->Join("sap_", "sap_.purchase_order", "=", "dokumen_sap.no_sap")
                ->where("dokumen_sap.type", "=", $type)
                ->where("dokumen_sap.no_sap", "=", $no_sap)
                ->groupBy("dokumen.no_dokumen")
                ->select('*', 'dokumen.id as id_dokumen', 'sub_jenis_dokumen.id as sub_jenis_id', 'actifity.id as actifity_id', 'sap_.purchase_order as po')
                ->orderBy('sub_jenis_dokumen.id');
            return $dokumen_id;

        }elseif($type == 'gr'){
            
            $dokumen_id = DB::table('dokumen')
                ->Join("dokumen_sap", "dokumen.id", "=", "dokumen_sap.dokumen_id")
                ->Join("sub_jenis_dokumen", "dokumen.sub_jenis_id", "=", "sub_jenis_dokumen.id")
                ->Join("actifity", "sub_jenis_dokumen.actifity_id", "=", "actifity.id")
                ->Join("sap_", "sap_.good_receipt", "=", "dokumen_sap.no_sap")
                ->where("dokumen_sap.type", "=", $type)
                ->where("dokumen_sap.no_sap", "=", $no_sap)
                ->where("sap_.good_receipt", "=", $no_sap)
                ->groupBy("dokumen.no_dokumen")
                ->select('*', 'dokumen.id as id_dokumen', 'sub_jenis_dokumen.id as sub_jenis_id', 'actifity.id as actifity_id', 'sap_.purchase_order as po')
                ->orderBy('sub_jenis_dokumen.id');
            return $dokumen_id;

        }elseif($type == 'cd'){
            
            $dokumen_id = DB::table('dokumen')
                ->Join("dokumen_sap", "dokumen.id", "=", "dokumen_sap.dokumen_id")
                ->Join("sub_jenis_dokumen", "dokumen.sub_jenis_id", "=", "sub_jenis_dokumen.id")
                ->Join("actifity", "sub_jenis_dokumen.actifity_id", "=", "actifity.id")
                ->Join("sap_", "sap_.clearing_doc", "=", "dokumen_sap.no_sap")
                ->where("dokumen_sap.type", "=", $type)
                ->where("dokumen_sap.no_sap", "=", $no_sap)
                ->where("sap_.clearing_doc", "=", $no_sap)
                ->groupBy("dokumen.no_dokumen")
                ->select('*', 'dokumen.id as id_dokumen', 'sub_jenis_dokumen.id as sub_jenis_id', 'actifity.id as actifity_id', 'sap_.purchase_order as po')
                ->orderBy('sub_jenis_dokumen.id');
            return $dokumen_id;
        }elseif($type == 'pr'){
            $dokumen_id = DB::table('dokumen')
                ->Join("dokumen_sap", "dokumen.id", "=", "dokumen_sap.dokumen_id")
                ->Join("sub_jenis_dokumen", "dokumen.sub_jenis_id", "=", "sub_jenis_dokumen.id")
                ->Join("actifity", "sub_jenis_dokumen.actifity_id", "=", "actifity.id")
                ->where("dokumen_sap.type", "=", $type)
                ->where("dokumen_sap.no_sap", "=", $no_sap)
                ->groupBy("dokumen.no_dokumen")
                ->select('*', 'dokumen.id as id_dokumen', 'sub_jenis_dokumen.id as sub_jenis_id', 'actifity.id as actifity_id')
                ->orderBy('sub_jenis_dokumen.id');
            return $dokumen_id;           
        }
    }

    public function status_dokumen()
    {
        return $this->belongsTo('App\Models\Status_dokumen', 'status_dokumen_id');
    }

    // public function scopePogrcd($query, $type, )

    

}
