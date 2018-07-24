<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Noticia;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Noticia::class =>  \App\Policies\NoticiaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //definindo autorização
        /*
            Gate::define('noticia-update', function(User $user, Noticia $noticia){
                return $user->id == $noticia->user_id;
            });
         */

        //Recuperando todas as permissões
        $permissions = Permission::with('rules')->get();
        
        foreach ($permissions as $permission){
            $gate->define($permission->name , function(User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }

        $gate->before(function(User $user, $ability){
           if ($user->hasAnyRoles('adm'))
                return true; 
        });

    }
}
