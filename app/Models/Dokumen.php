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

	protected $fillable = ['no_dokumen', 'nama_dokumen', 'file_name_pdf', 'lokasi_file_pdf', 'tag_keterangan', 'sub_jenis_id', 'unit_asal', 'unit_tujuan', 'visibility_id', 'created_by'];

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

    public function dokumen_pr()
    {
        return $this->hasOne('App\Models\Dokumen_pr', 'dokumen_id');
    }

    public function dokumen_po()
    {
        return $this->hasOne('App\Models\Dokumen_po', 'dokumen_id');
    }

    public function scopeFindGlobal($query, $key)
    {
        $dokumen = DB::table("dokumen")
            ->leftJoin("dokumen_po", "dokumen.id", "=", "dokumen_po.dokumen_id")
            ->leftJoin("dokumen_pr", "dokumen.id", "=", "dokumen_pr.dokumen_id")
            ->where("file_name_pdf", "like", "%$key%")
            ->orWhere("po" , "like", "%$key%")
            ->orWhere("pr", "like", "%$key%")
            ->select('*', 'dokumen.id as id_dokumen')
            ->paginate(2);
        return $dokumen;
    }
}
