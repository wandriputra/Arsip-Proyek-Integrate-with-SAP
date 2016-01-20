<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\sapController as sapControler;

use Schema;

class Sap extends Model
{
    protected $table = 'sap_';
    public $timestamps = false;

    protected $fillable = array_values(Schema::getColumnListing($this->table));

}
