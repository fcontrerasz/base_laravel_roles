<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
//use Spatie\Permission\Traits\HasPermissions;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;

//Añadimos la clase JWTSubject 
use Tymon\JWTAuth\Contracts\JWTSubject;


class UsuariosWeb extends Authenticatable implements AuthenticatableContract, JWTSubject {

    //use Authenticatable;
    use Notifiable;
	use Sortable;
    use HasRoles;

    public $guarded = [];
    public $sortable = ['id'];
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function empresas()
    {
        return $this->belongsToMany('App\Empresa', 'asig_empresas', 'idusr', 'idemp')->withTimestamps();
    }

    public function authorizeRoles($menuroles)
    {
        if ($this->hasAnyRole($menuroles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    
    public function hasAnyRole($menuroles)
    {
        if (is_array($menuroles)) {
            foreach ($menuroles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($menuroles)) {
                return true;
            }
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
        return false;
    }
    public function getRole()
    {
        return $this->roles->first()->name;
    }
    public function getMenuRole()
    {
        return $this->roles_menu()->first()->rol_nombre;
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
