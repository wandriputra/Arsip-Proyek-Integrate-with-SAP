<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
	use SoftDeletes;
	
    protected $table = 'folder';
    protected $dates = ['deleted_at'];
   	protected $fillable = ['nama_folder', 'folder_induk', 'unit_id', 'created_by'];

   	public function dokumen()
   	{
   		return $this->belongsToMany('App\Models\Dokumen', 'folder_dokumen', 'folder_id', 'dokumen_id');
   	}
}
