<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level_sub_jenis extends Model
{
    //
    protected $table = 'level_sub_jenis';
    protected $fillable = ['nama_level', 'sub_jenis_id'];

    public function sub_jenis_dokumen()
    {
    	return $this->belongsTo('App\Models\Sub_jenis_dokumen', 'sub_jenis_id');
    }
}
