<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model{

    public function user(){
        return $this->belongsTo(User::class);
    }

}
