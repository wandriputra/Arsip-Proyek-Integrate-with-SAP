<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_jenis_dokumen extends Model
{
    //

    protected $table = 'sub_jenis_dokumen';

    protected $fillable = ['nama_sub', 'singkatan', 'actifity_id', 'created_by'];

    public function jenis_dokumen()
    {
    	return $this->belongsTo('App\Models\Jenis_dokumen', 'induk_jenis_dokumen');
    }

    public function user()
    {
    	return $this->hasMany('App\Models\User');
    }

    public function actifity()
    {
        return $this->belongsTo('App\Models\actifity', 'actifity_id');
    }

    public function dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }

    public function level_dokumen()
    {
        return $this->belongsToMany('App\Models\Level_dokumen', 'level_sub_dokumen', 'sub_jenis_id', 'level_id');
    }
}
