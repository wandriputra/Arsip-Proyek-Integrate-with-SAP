<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    //
    use SoftDeletes;

	protected $table = 'dokumen';

	protected $fillable = ['no_dokumen', 'nama_dokumen', 'file_name_pdf', 'lokasi_file_pdf', 'tag_keterangan', 'sub_jenis_id', 'asal_surat', 'tujuan_surat', 'visibility_id', 'created_by'];

	public static $rules = [
    	'jenis_dokumen' => 'required',
    	'sub_jenis_dokumen' => 'required',
    	'pr' => 'required',
    	'po' => 'required',
    	'file_pdf' => 'required'
    ];

    protected $dates = ['deleted_at'];

    public function sub_jenis_dokumen()
    {
        return $this->belongsTo('App\Models\Sub_jenis_dokumen', 'sub_jenis_id');
    }

    public function unit_asal()
    {
        return $this->belongsTo('App\Models\Unit', 'asal_surat');
    }
    
    public function unit_tujuan()
    {
        return $this->belongsTo('App\Models\Unit', 'tujuan_surat');
    }

    public function folder()
    {
        return $this->belongsToMany('App\Models\Folder', 'folder_dokumen', 'dokumen_id', 'folder_id');
    }
}
