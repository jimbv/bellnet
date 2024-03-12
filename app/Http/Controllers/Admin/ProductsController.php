<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{

    public function list(){
        return view('admin.products.list');
    }

    public function create(){
        return view('admin.products.create');
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'description.required' => 'El campo Descripción es obligatorio.',
                'price.required' => 'El campo Precio es obligatorio.',
                'images.*.image' => 'El archivo debe ser una imagen.',
                'images.*.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'images.*.max' => 'La imagen no debe superar los 2048 KB.',
            ]);

            
            $images = isset($validatedData['images'])?$validatedData['images']:[]; 
            unset($validatedData['images']);

            $product = Product::create($validatedData);
            
            foreach ($images as $image) {
                $path = $image->store('imgs/product_images', 'publico');
                $product->images()->create(['image_path' => $path]);
            }

            // Limpiar campos del formulario e imágenes después de guardar
            return redirect()->back()->with('success', 'Producto guardado correctamente.');
        } catch (Exception $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            //dd($e);
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->with($errors);
        }
    }
}
