<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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

    public function catalogo()
    {
        $url_catalogo = Configuration::first()->url_catalogo; 
        return redirect()->away($url_catalogo);
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
