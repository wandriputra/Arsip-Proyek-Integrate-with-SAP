<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen_sap extends Model
{
    //
    protected $table = 'dokumen_sap';

    protected $fillable = ['no_sap', 'dokumen_id', 'type'];
}
