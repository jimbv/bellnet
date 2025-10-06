<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function mostrarCategoria($slug)
    {

        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $category = Category::where('slug', $slug)->first();
        $categories = Category::orderBy('name')->get();
        $products = Product::where('category_id', $category->id)->paginate(12);
        return view('products', compact('products', 'category', 'categories', 'services'));
    }

    public function mostrarProducto($slug)
    {
        $categories = Category::orderBy('name')->get();
        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $product = Product::where('slug', $slug)->first();
        return view('product', compact('product', 'services', 'categories'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');

        $products = Product::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderBy('name')
            ->paginate(12); // Paginado elegante 😎


        $services = Service::select('name', 'slug')->orderBy('name')->get();
        $category = null;
        $categories = Category::orderBy('name')->get(); 
        return view('products', compact('products', 'category', 'categories', 'services','query'));
    }
}
