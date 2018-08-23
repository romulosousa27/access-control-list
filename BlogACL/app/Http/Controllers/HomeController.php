<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //$posts = Post::where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }

    public function update($id){
        $post = Post::find($id);

        if(Gate::denies('update', $post)){
            return view('errors.403');
        }
        return view('edit', compact('post'));
    }

    public function rolesPermissions(){

        //recuperando o nome ,regras
        $user =  auth()->user()->name;
        $roles = auth()->user()->roles;


        // permissão do perfil
        foreach( auth()->user()->roles  as $roles){
            echo $roles->name .":\n";

            $permissions = $roles->permissions;
            foreach ($permissions as $permission) {
                echo $permission->name . "\n";
            }
        }

        //return view('debug', compact('user', 'roles', 'permissions'));
    }
}
