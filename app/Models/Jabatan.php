<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $table = 'jabatan';

    protected $fillable = ['nama_jabatan', 'created_by'];

    public function personil($value='')
    {
    	return $this->hasMany('App\Models\Personil');
    }
}
