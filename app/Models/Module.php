<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $table = 'module_app';
    protected $fillable = ['nama_module', 'description'];

    public function has_role()
    {
        return $this->belongsToMany('App/Models/Role_user', 'role_user_has_module', 'module_id', 'rolu_user_id');
    }
    
}
