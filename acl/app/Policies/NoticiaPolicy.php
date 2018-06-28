<?php

namespace App\Policies;

use App\Noticia;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function noticiaUpdate(User $user, Noticia $noticia){
        return $user->id == $noticia->user_id;
    }
}
