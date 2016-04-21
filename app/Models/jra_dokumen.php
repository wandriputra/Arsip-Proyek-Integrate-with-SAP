<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Jra_dokumen extends Model
{
    //TODO: relasi jra dokumen dengan dirinya sendiri dan table dokumen

    protected $table = 'jra_dokumens';

    protected $fillable = ['kode', 'jenis_arsip', 'waktu_aktif', 'waktu_inaktif', 'keterangan', 'kode_induk', 'level'];

    public static $rules = array(
        'kode' => 'required|unique'
    );

    public function induk_jra()
    {
        return $this->belongsTo($this);
    }
}
