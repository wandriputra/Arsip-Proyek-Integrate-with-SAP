<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saplog extends Model
{
    //
    protected $table = 'sap_log';
    protected $fillable = ['file_name', 'jumlah_row', 'status', 'created_by'];

    public function user_created()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
