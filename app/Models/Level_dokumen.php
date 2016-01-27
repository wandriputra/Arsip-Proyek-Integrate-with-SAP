<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level_dokumen extends Model
{
    //
    protected $table = 'level_dokumen';

    public function sub_jenis_dokumen($value='')
    {
    	return $this->belongsToMany('App\Models\Sub_jenis_dokumen', 'level_sub_dokumen', 'level_id', 'sub_jenis_id');
    }
}
