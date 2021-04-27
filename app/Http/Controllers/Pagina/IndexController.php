<?php

namespace App\Http\Controllers\Pagina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product; 
use App\Noticia; 
use App\Permisos\Models\Role; 
use App\Mail\ContactoMail;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{  
    
    public function index()
    { 
        $noticias =  Noticia::with('images')->orderBy('fecha','desc')->paginate(4);
        $resultado = '';
        return view('pagina.index',compact('resultado','noticias'));
    }
    public function empresa(){
        $categorias = Category::all();
        return view ('tienda.empresa',compact('categorias'));
    }
    
    public function contacto(){  
        $resultado = '';
        return view ('pagina.index',compact('resultado'));
    }

    public function contactoenviado(Request $request){
 
           
            $nombre = $request->nombre;
            $localidad = $request->localidad;
            $email = $request->email;
            $telefono = $request->telefono;
            $asunto = $request->asunto;
            $mensaje = $request->mensaje;

            
            
            $mensaje_enviar = $request->validate([
                'nombre'=> 'required',
                'localidad'=> 'required',
                'email'=> 'required|email',
                'mensaje'=> 'required',
                'telefono'=> 'required',
                'asunto'=> 'required'
            ]);


            // Enviar el email, el metodo send envia un MAILABLE que es una clase de laravel para armar un email

            Mail::to('joseignaciomartin@gmail.com')->send(new ContactoMail($mensaje_enviar));

            $resultado = '<div style="font-weight:bold;font-size:24px;">Gracias por enviarnos su mensaje en la brevedad nos contactaremos.<br/><br/><br/></div>';
            
        return view ('pagina.index',compact('resultado'));

    }

    public function categoria(Request $respuesta)
    {
        $categorias = Category::all(); 
        $slug = $respuesta->slug;
        $cat = Category::with('products')->where('slug',$slug)->firstOrFail(); 
        $productos = $cat->products;
        return view('tienda.categoria',compact('cat','categorias','productos'));
    }

    public function role(Request $respuesta)
    { 
        $slug = $respuesta->slug;
        $rol = Role::where('slug',$slug)->firstOrFail(); 
        
        return $role;
        //return view('admin.role',compact('permisos'));
    }

    public function producto(Request $respuesta)
    { 
        $categorias = Category::all(); 
        $slug = $respuesta->slug;
        $producto = Product::where('slug',$slug)->firstOrFail();  
        return view('tienda.producto',compact('categorias','producto'));
    }

}
