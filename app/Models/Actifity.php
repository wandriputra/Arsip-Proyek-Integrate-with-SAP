<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actifity extends Model
{
    //
    protected $table = "actifity";

    protected $fillable = ['nama_actifity', 'jenis_id', 'created_by', 'unit_id'];

    protected $rule = ['nama_actifity' => 'required'];

    public function unit()
    {
    	return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

    public function sub_jenis_dok()
    {
    	return $this->hasMany('App\Models\Sub_jenis_dokumen', 'actifity_id');
    }
}
