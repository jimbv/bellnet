<?php

namespace App\Http\Controllers\Pagina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Noticia; 

class ControladorNoticia extends Controller
{
    public function noticias()
    { 
        $noticias =  Noticia::with('images')->where('titulo','like',"%%")->orderBy('fecha','desc')->paginate(10);   
        return view('pagina.noticias',compact('noticias'));
    }

    public function noticia(Request $respuesta)
    { 
        $slug = $respuesta->slug;
        $noticia = Noticia::with('images')->where('slug',$slug)->firstOrFail(); 
        return view('pagina.noticia',compact('noticia'));
    }

}
