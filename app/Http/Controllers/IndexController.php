<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Testimony;
use App\Models\Service; 

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $services = Service::select('name', 'slug')->orderBy('name')->get(); 
        $testimonials = Testimony::all();        
        $posts = Post::with('images')
                 ->latest()
                 ->take(9) // últimas 9
                 ->get();
        return view('index',compact('categories','testimonials','posts','services')); 
    }
 
    public function empresa()
    {
        $categories = Category::all(); 
        return view('page.empresa',compact('categories')); 
    }
}
