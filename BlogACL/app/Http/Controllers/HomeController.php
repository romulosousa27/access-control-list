<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Gate;

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
        //$this->authorize('update', $post);
        if(Gate::denies('update', $post)){
            abort(403, 'Sem Autorização');
        }


        return view('update', compact('post'));
    }
}
