<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    //
    protected $table = 'checklist';
    protected $fillable = ['nama_checklist', 'unit_id', 'created_by'];

    public function unit(){
        return $this->belongsTo('App\Models\unit');
    }


}
