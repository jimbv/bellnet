<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index()
    {
        /*

        $cat = new Product();
        $cat->nombre = 'Arte';
        $cat->slug = 'arte';
        $cat->descripcion = 'Arte';
        $cat->save();
        return $cat;
*/
    

        return Product::all();
    }
    
    public function show($slug)
    {
        if (Product::where('slug',$slug)->first()) {
            return 'Slug existe';
        }else{
            return 'Slug disponible';
        }
    }

    public function eliminarimagen($id)
    {
        $image = Image::find($id);
        $archivo = substr($image->url,1);
        $eliminar = File::delete($archivo);
        $image->delete();
        return 'Eliminado: Id '.$id;
    }

}
