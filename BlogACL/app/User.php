<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

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

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /*
        definindo se o user logado tem permmissão para uma determinado funcionalidade do sistema
    */
    public function hasPermission(Permission $permission){
        //as regras de permissão.
        return $this->hasAnyRoles($permission->roles);
    }

    //verifica se o user tem a determinada permissão.
    public function hasAnyRoles($roles){

        if (is_array($roles) || is_object($roles)) {
            return !! $roles->intersect($this->roles)->count();
        }
        return $this->roles->contains('name', $roles);
    }
}
