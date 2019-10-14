<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    protected $primaryKey = 'idrol';

    public function users()
	{
    	return $this->belongsToMany('App\UsuariosWeb', 'asig_roles' , 'idrol' , 'idusr')->withTimestamps();
	}
}
