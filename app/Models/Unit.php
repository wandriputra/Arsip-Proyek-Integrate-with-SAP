<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table ="unit";

    protected $fillable = ['nama_unit', 'singkatan', 'created_by'];

    public function personil($value='')
    {
    	return $this->hasMany('App\Models\Personil');
    }

    public function FunctionName($value='')
    {
    	# code...
    }
}
