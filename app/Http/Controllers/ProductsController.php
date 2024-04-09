<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request; 

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('page.products', compact('categories'));
    }

    public function mostrarCategoria($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->get();
        return view('page.products', compact('products', 'category', 'categories'));
    }

    public function mostrarProducto($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('page.product', compact('product'));
    }
}
