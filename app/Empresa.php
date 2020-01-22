<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Empresa extends Model
{
    use Sortable;
    public $sortable = ['idemp','rut','nombre','razon_social','empresa_validada', 'created_at'];
    protected $table = 'empresas';
    protected $primaryKey = 'idemp';
    public $timestamps = true;

    protected $fillable = [
        'nombre', 'email','razon_social', 'rut', 'activado', 'created_at', 'updated_at', 'empresa_validada',
    ];

    public function users()
	{
    	return $this->belongsToMany('App\UsuariosWeb', 'asig_empresas' , 'idemp' , 'idusr')->withTimestamps();
	}

	
}
