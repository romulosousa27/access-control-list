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
        $noticias = $noticia->all();
        
        return view('home', compact('noticias'));  
    }

    public function update($noticiaID){
        //retornando a noticia espeficica
        $noticia = Noticia::find($noticiaID);

        //$this->authorize('noticia-update', $noticia);
        if(Gate::denies('noticia-update', $noticia)){
            abort(403, "Não Autorizado!");
        }
        return view('noticia-update', compact('noticia'));
    }


}
