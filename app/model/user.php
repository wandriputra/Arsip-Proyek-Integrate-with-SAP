<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class user extends Model implements AuthenticatableContract
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

}
