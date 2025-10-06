<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;

class ProductsController extends Controller
{
    public function index()
    {
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $category = Category::where('slug', $slug)->first();
        $categories = Category::orderBy('name')->get();
        $products = Product::paginate();
        return view('products', compact('products', 'category', 'categories','services'));
    }

    public function mostrarCategoria($slug)
    {

        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $category = Category::where('slug', $slug)->first();
        $categories = Category::orderBy('name')->get();
        $products = Product::where('category_id', $category->id)->paginate();
        return view('products', compact('products', 'category', 'categories','services'));
    }

    public function mostrarProducto($slug)
    {
        $categories = Category::orderBy('name')->get();
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $product = Product::where('slug', $slug)->first();
        return view('product', compact('product','services','categories'));
    }
}
