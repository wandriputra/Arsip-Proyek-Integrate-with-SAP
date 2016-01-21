<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Model implements AuthenticatableContract
{
    //
	use Authenticatable;  
    
    protected $table = 'user';

    protected $fillable = ['username', 'password', 'status', 'role_user_id', 'created_by', 'personil_id'];
    protected $hidden = ['password', 'remember_token'];

    public function getRememberToken()
	{
    	return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function role_user()
	{
		# code...
		return $this->belongsTo('App\Models\Role_user');
	}

	public function personil($value='')
	{
		# code...
		return $this->belongsTo('App\Models\Personil');
	}

	public function dokumen($value='')
	{
		# code...
		return $this->hasMany('App\Models\Dokumen');
	}

	public function user($value='')
    {
    	return $this->belongsTo('App\Models\User', 'created_by');
    }

	public function user_get($value='')
    {
    	return $this->hasMany('App\Models\User');
    }

}