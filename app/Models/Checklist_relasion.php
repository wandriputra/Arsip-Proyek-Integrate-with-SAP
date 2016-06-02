<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist_relasion extends Model
{
    //
    protected $table = 'checklist_has_activity_jenis';

    protected $fillable = ['checklist_id', 'actifity_id', 'sub_jenis_id'];
    public $timestamps = false;

    public function actifity(){
        return $this->belongsTo('App\Models\Actifity');
    }

    public function checklist(){
        return $this->belongsTo('App\Models\Checklist');
    }

    public function sub_jenis_dok(){
        return $this->belongsTo('App\Models\Sub_jenis_dokumen', 'sub_jenis_id');

    }

}
