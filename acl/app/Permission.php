<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    // retornando todas as regras(rules) das permissões(permission)
    public function rules(){
        return $this->belongsToMany(Rules::class);
    }
}
