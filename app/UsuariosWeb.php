<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UsuariosWeb extends Model
{
	use Sortable;
    public $guarded = [];
    public $sortable = ['idusr'];
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $primaryKey = 'idusr';

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'asig_roles', 'idusr', 'idrol')->withTimestamps();
    }

    public function empresas()
    {
        //dd("1");
        return $this->belongsToMany('App\Empresa', 'asig_empresas', 'idusr', 'idemp')->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
      // dd($roles);
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('rol_nombre', $role)->first()) {
            return true;
        }
        return false;
    }
    public function hasAsigEmpresa()
    {
       $trae_emp = $this->empresas()->get();
        if ($trae_emp->count() > 0) {
            return true;
        }
        return false;
    }
    public function getEmpresa()
    {
        return $this->empresas()->first()->idemp;
    }
    public function hasValidEmpresa()
    {
         if ($this->empresas()->first()->empresa_validada) {
            return true;
         }
       /* if ($this->empresas()->where('rol_nombre', $role)->first()) {
            return true;
        }*/
        return false;
    }
    public function getRole()
    {
        return $this->roles()->first()->rol_nombre;
    }
}
