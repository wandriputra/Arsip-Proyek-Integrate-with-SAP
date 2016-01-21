<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    //
    protected $table = 'role_user';

    protected $fillable = ['nama'];

    public function user($value='')
	{
		return $this->belongsTo('App\Model\User');
	}

    public function role($value='')
	{
		return $this->hasMany('App\Model\User');
	}

}
