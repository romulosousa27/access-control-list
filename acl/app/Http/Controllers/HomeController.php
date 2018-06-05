<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\User;
use Gate;

class HomeController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Noticia $noticia){
        // retornando todas a noticias.
        //$noticias = $noticia->all();
        $noticias = $noticia->where('user_id', auth()->user()->id)->get();
        
        return view('home', compact('noticias'));  
    }

    public function update($noticiaID){
        //retornando a noticia espeficica
        $noticia = Noticia::find($noticiaID);

        // Filtrando permissão 
        if(Gate::denies('noticia-update', $noticia)){
            return view('errors.error-403');
        }
        return view('noticia-update', compact('noticia'));
    }


}
