<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    //
    protected $table = "personil";

    protected $fillable = ['nik', 'nama_personil', 'singkatan', 'email', 'unit_id', 'jabatan_id', 'atasan_id', 'created_by'];

    public function unit($value='')
    {
    	return $this->belongsTo('App\Models\Unit');
    }

    public function jabatan($value='')
    {
    	return $this->belongsTo('App\Models\Jabatan');
    }

    public function atasan($value='')
    {
    	return $this->belongsTo($this);
    }

    public function personil($value='')
    {
    	return $this->hasMany($this);
    }

    public function user($value='')
    {
    	return $this->hasMany('App\Models\User');
    }
}
