<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Use Models
use App\Noticia;

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
    public function index(Noticia $noticia){
        // retornando todas a noticias.
        $noticias = $noticia->all();

        return view('home', compact('noticias'));
    }
}
