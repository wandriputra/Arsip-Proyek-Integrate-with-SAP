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

	public function module_user()
	{
		return $this->belongsToMany('App\Models\Module', 'role_user_has_module', 'role_user_id', 'module_id');
	}

	public function has_module($id_module)
	{
		$role = Role_user::module_user()->where('id', $id_module)->orWhere('nama_module', $id_module)->get();
		if (count($role)!= 0){
			return true;
		}else{
			return false;
		}
//		$collection = collect($role);
	}



}
