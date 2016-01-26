<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_jenis_dokumen extends Model
{
    //

    protected $table = 'sub_jenis_dokumen';

    protected $fillable = ['nama_sub', 'singkatan', 'induk_jenis_dokumen', 'created_by'];

    public function jenis_dokumen()
    {
    	return $this->belongsTo('App\Models\Jenis_dokumen', 'induk_jenis_dokumen');
    }

    public function user()
    {
    	return $this->hasMany('App\Models\User');
    }

    public function dokumen()
    {
        return $this->hasMany('App\Models\Dokumen');
    }
}
