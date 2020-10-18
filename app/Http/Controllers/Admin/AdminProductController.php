<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class AdminProductController extends Controller
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
        $nombre = $request->get('nombre');
        //dd($nombre);
        $productos = Product::with('images','category')->where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(5);
        return view('admin.product.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        
        $estados_productos = $this->estados_productos();

        return view('admin.product.create',compact('categorias','estados_productos'));

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
            'nombre'=> 'required|max:255|unique:products,nombre',
            'slug'=> 'required|max:255|unique:products,slug',
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
        

        
        $prod = new Product;


        $prod->nombre = $request->nombre;	 
        $prod->slug = $request->slug;	 
        $prod->category_id = $request->category_id;	 
        $prod->cantidad = $request->cantidad;
        $prod->precio_anterior = $request->precioanterior;	 
        $prod->precio_actual = $request->precioactual;	 
        $prod->porcentaje_descuento = $request->porcentajededescuento;	 
        $prod->descripcion_corta = $request->descripcion_corta;	 
        $prod->descripcion_larga = $request->descripcion_larga;	 
        $prod->especificaciones = $request->especificaciones;	 
        $prod->datos_de_interes = $request->datos_de_interes;	 
        $prod->estado = $request->estado;

        if($request->activo){
            $prod->activo = 'Si';
        }else{
            $prod->activo = 'No';
        }

        if($request->sliderprincipal){
            $prod->slider_principal = 'Si';
        }else{
            $prod->slider_principal = 'No';
        }
  
        $prod->save();
 
        $prod->images()->createMany($urlimagenes);

       // return $prod->images;
       return redirect()->route('admin.product.index')->with('datos','Registro creado correctamente');

        
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
        $producto = Product::with('images','category')->where('slug',$slug)->firstOrFail();
        $categorias = Category::orderBy('nombre')->get();

        $estados_productos = $this->estados_productos();
        return view('admin.product.edit',compact('categorias','producto','estados_productos'));

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
            'nombre'=> 'required|max:255|unique:products,nombre,'.$id,
            'slug'=> 'required|max:255|unique:products,slug,'.$id,
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
        

        
        $prod = Product::findOrFail($id);


        $prod->nombre = $request->nombre;	 
        $prod->slug = $request->slug;	 
        $prod->category_id = $request->category_id;	 
        $prod->cantidad = $request->cantidad;
        $prod->precio_anterior = $request->precioanterior;	 
        $prod->precio_actual = $request->precioactual;	 
        $prod->porcentaje_descuento = $request->porcentajededescuento;	 
        $prod->descripcion_corta = $request->descripcion_corta;	 
        $prod->descripcion_larga = $request->descripcion_larga;	 
        $prod->especificaciones = $request->especificaciones;	 
        $prod->datos_de_interes = $request->datos_de_interes;	 
        $prod->estado = $request->estado;

        if($request->activo){
            $prod->activo = 'Si';
        }else{
            $prod->activo = 'No';
        }

        if($request->sliderprincipal){
            $prod->slider_principal = 'Si';
        }else{
            $prod->slider_principal = 'No';
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
        $prod = Product::findOrFail($id); 
        $prod->delete();
        return redirect()->route('admin.product.index')->with('datos','Registro eliminado correctamente');
    }


    public function estados_productos()
    {
        return [
            '',
            'Destacado'       
        ];
    }


}
