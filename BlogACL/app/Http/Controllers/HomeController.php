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
        //$posts = Post::all();
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }

    public function update($id){
        $post = Post::find($id);

        if(Gate::denies('update', $post)){
            return view('errors.403');
        }
        return view('update', compact('post'));
    }

    public function rolesPermissions(){

        //recuperando o nome ,regras e permissões.
        $user =  auth()->user()->name;
        $roles = auth()->user()->roles;

        return view('debug', compact('user', 'roles'));
    }
}
