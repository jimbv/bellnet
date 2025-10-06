<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Testimony;
use App\Models\Service;
use App\Models\WorkImages;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $services = Service::select('name', 'slug')->orderBy('name')->get(); 
        $testimonials = Testimony::all();        
        $work_images = WorkImages::all();        
        $posts = Post::with('images')
                 ->latest()
                 ->take(9) // últimas 9
                 ->get();
        return view('index',compact('categories','testimonials','posts','services','work_images')); 
    }
 
    public function page($slug)
    {
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $page = Page::where('slug', $slug)->first();
        return view('page', compact('page','services','categories'));
    }
}
