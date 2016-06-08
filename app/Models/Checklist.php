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

    public function checklist_relation()
    {
        return $this->hasMany('App\Models\Checklist_relasion', 'checklist_id');
    }

    public function has_dokumen()
    {
        return $this->belongsToMany('App\Models\Dokumen', 'checklist_has_dokumen', 'checklist_id', 'dokumen_id');

    }


}
