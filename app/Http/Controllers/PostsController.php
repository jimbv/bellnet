<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('page.posts');
    }

    public function mostrarPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('page.post', compact('post'));
    }
}
