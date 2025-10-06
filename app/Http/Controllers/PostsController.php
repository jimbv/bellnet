<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Service;

class PostsController extends Controller
{
    public function index()
    {
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $posts = Post::with('images')
                 ->latest()
                 ->paginate(6); // 6 por página
        return view('novedades', compact('categories','services','posts'));
    }

    public function mostrarPost($slug)
    {
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $post = Post::where('slug', $slug)->first();
        return view('novedad', compact('post','services','categories'));
    }
}
