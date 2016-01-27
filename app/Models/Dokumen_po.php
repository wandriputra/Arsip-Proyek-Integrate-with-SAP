<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen_po extends Model
{
    //
    protected $table= 'dokumen_po';

    protected $fillable = ['dokumen_id', 'po'];

    public function dokumen()
    {
    	return $this->belongsTo('App\Models\Dokumen', 'dokumen_id');
    }

}
