<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_dokumen extends Model
{
    //
    protected $table = 'jenis_dokumen';

    protected $fillable = ['nama_jenis', 'created_by'];

    public function user($value='')
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function sub_jenis_dokumen($value='')
    {
    	return $this->hasMany('App\Models\Sub_jenis_dokumen');
    }

    public function dokumen($value='')
    {
    	return $this->hasMany('App\Models\dokumen');
    }
}
