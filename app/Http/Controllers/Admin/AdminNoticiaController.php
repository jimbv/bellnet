<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Noticia;

class AdminNoticiaController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('titulo'); 
        $noticias = Noticia::with('images')->where('titulo','like',"%$titulo%")->orderBy('titulo')->paginate(5);
        return view('admin.noticia.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$categorias = Category::orderBy('nombre')->get();
        
        $estados_productos = $this->estados_productos();

        return view('admin.noticia.create',compact('categorias','estados_productos'));*/
        return view('admin.noticia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'titulo'=> 'required|max:255|unique:noticias,titulo',
            'slug'=> 'required|max:255|unique:noticias,slug',
            'imagenes.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        
        $urlimagenes = [];

        // Si viene un archivo de las imagenes
        if($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');

            foreach($imagenes as $imagen){
                $nombre = time().'_'.$imagen->getClientOriginalName();

                $ruta = public_path().'/imagenes';

                $imagen->move($ruta,$nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
            

        }
        

        
        $noticia = new Noticia;


        $noticia->titulo = $request->titulo;	 
        $noticia->slug = $request->slug;	 
        $noticia->texto_corto  = $request->texto_corto;	 
        $noticia->texto = $request->texto;	 
        $noticia->fecha = $request->fecha;	 
          

        if($request->sliderprincipal){
            $noticia->slider_principal = 'Si';
        }else{
            $noticia->slider_principal = 'No';
        }
  
        $noticia->save();
 
        $noticia->images()->createMany($urlimagenes);
 
       return redirect()->route('admin.noticia.index')->with('datos','Registro creado correctamente');

        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $noticia = Noticia::with('images')->where('slug',$slug)->firstOrFail();
        return view('admin.noticia.edit',compact('noticia'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'=> 'required|max:255|unique:noticias,titulo,'.$id, 
            'imagenes.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        
        $urlimagenes = [];

        // Si viene un archivo de las imagenes
        if($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');

            foreach($imagenes as $imagen){
                $nombre = time().'_'.$imagen->getClientOriginalName();

                $ruta = public_path().'/imagenes';

                $imagen->move($ruta,$nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
            

        }
        

        
        $noticia = Noticia::findOrFail($id);


        $noticia->titulo = $request->titulo;	 
        $noticia->slug = $request->slug;	 	 
        $noticia->texto_corto = $request->texto_corto;	 
        $noticia->texto = $request->texto; 
        $noticia->fecha = $request->fecha; 
 

        if($request->sliderprincipal){
            $noticia->slider_principal = 'Si';
        }else{
            $noticia->slider_principal = 'No';
        }
  
        $prod->save();
 
        $prod->images()->createMany($urlimagenes);

       // return $prod->images;
       return redirect()->route('admin.product.edit',$prod->slug)->with('datos','Registro actualizado correctamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id); 
        $noticia->delete();
        return redirect()->route('admin.noticia.index')->with('datos','Registro eliminado correctamente');
    }
}

