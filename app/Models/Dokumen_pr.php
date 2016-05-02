<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen_pr extends Model
{
    //
    protected $table='dokumen_pr';

    protected $fillable = ['dokumen_id', 'pr'];

    public function dokumen()
    {
    	return $this->belongsTo('App\Models\Dokumen', 'dokumen_id');
    }

}
