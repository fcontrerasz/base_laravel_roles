<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $primaryKey = 'idemp';
    public $timestamps = true;

    protected $fillable = [
        'nombre', 'email', 'rut', 'activado', 'created_at', 'updated_at', 'empresa_validada',
    ];

    public function users()
	{
    	return $this->belongsToMany('App\UsuariosWeb', 'asig_empresas' , 'idemp' , 'idusr')->withTimestamps();
	}

	public function hasEmpresa($role)
    {
        dd(1);
        return false;
    }
}
