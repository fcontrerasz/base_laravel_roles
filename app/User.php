<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'idusr';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        //dd("1");
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

    public function topLinks()
    {
        $items = [
            'overview'
        ];

        /*foreach($this->role->permissions as $group) {
            if($group['name'] === 'settings') {
                foreach($group['actions'] as $key => $value) {
                    if($value) {
                        $items[] = $group['name'];
                    }
                }
            } else {
                if(isset($group['actions']['index']) && !$group['actions']['index']) {
                    // not allowed
                } else {
                    $items[] = $group['name'];
                }
            }

        }*/

        return $items;
    }

}
