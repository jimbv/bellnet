<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Testimony;
use App\Models\Service;
use App\Models\WorkImages;
use App\Models\Configuration;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all(); 
        $work_images = WorkImages::all();
        return view('page.index',compact('categories','work_images')); 
    }
    
    public function prueba()
    {
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $categories = Category::all();
        $testimonials = Testimony::all();
        $posts = Post::with('images')
                 ->latest()
                 ->take(9) // últimas 9
                 ->get();
        return view('index',compact('categories','testimonials','posts','services')); 
    }

    public function catalogo()
    {
        $url_catalogo = Configuration::first()->url_catalogo; 
        return redirect()->away($url_catalogo);
    }

    public function devolucion()
    {
        $url_devolucion = Configuration::first()->url_devolucion; 
        return redirect()->away($url_devolucion);
    }
    
    public function lista()
    {
        $url_lista = Configuration::first()->url_lista; 
        return redirect()->away($url_lista);
    }

    public function empresa()
    {
        $categories = Category::all(); 
        return view('page.empresa',compact('categories')); 
    }
    
    public function glosario()
    {
        $categories = Category::all(); 
        return view('page.glosario',compact('categories')); 
    }
}
