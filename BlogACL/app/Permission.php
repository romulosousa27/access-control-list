<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //todas as regras vinculada a permissão.
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
