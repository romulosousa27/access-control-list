<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Noticia;
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

    public function rules(){
        return $this->belongsToMany(Rules::class);
    }

    public function hasPermission(Permission $permission){
        // retornando a permisão do usuario
        return $this->hasAnyRules($permission->rules);
    }

    public function hasAnyRules($rules){
        // verificando se o usuario tem esse permissão
        if(is_array($rules) || is_object($rules)){
            foreach($rules as $rule){
                return $this->rules->contains('name', $rule->name);
            }
        }

        return $this->rules->contains('name', $rules);
    }
}
