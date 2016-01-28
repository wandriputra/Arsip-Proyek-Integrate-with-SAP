<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table ="unit";

    protected $fillable = ['nama_unit', 'singkatan', 'unit_atasan', 'created_by'];

    public function personil($value='')
    {
    	return $this->hasMany('App\Models\Personil');
    }

    public function atasan()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function unit()
    {
        return $this->hasMany($this);
    }

    public function dokumen()
    {
        return $this->hasMany('App\Models\Dokumen', 'unit_asal');
    }
}
