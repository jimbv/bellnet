<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\ProductAdditional;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class ProductsController extends Controller
{

    public function list()
    {
        $products = Product::with('category')->get();
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $product_id_temporal = Uuid::uuid4()->toString(); 
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'product_id_temporal'));
    }


    
    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'category_id' => 'required',
                'technical_notes' => '',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'product_id_temporal' => 'required',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'slug.required' => 'El campo Nombre es obligatorio.',
                'category_id.required' => 'Seleccione una categoría',
                'description.required' => 'El campo Descripción es obligatorio.',
                'price.required' => 'El campo Precio es obligatorio.',
            ]);
    
            $id_temporal = $validatedData['product_id_temporal'];
            unset($validatedData['images']);
            unset($validatedData['product_id_temporal']);
    
            $product = Product::create($validatedData);

            ProductImage::where('product_id_temporal', $id_temporal)
            ->update(['product_id' => $product->id, 'product_id_temporal' => null]);

            ProductAdditional::where('product_id_temporal', $id_temporal)
            ->update(['product_id' => $product->id,'product_id_temporal' => null]);
 
            return redirect()->back()->with('success', 'Producto guardado correctamente.');
        } catch (Exception $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->with($errors);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'category_id' => 'required',
                'technical_notes' => '',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'product_id' => 'required',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'slug.required' => 'El campo Nombre es obligatorio.',
                'category_id.required' => 'Seleccione una categoría',
                'description.required' => 'El campo Descripción es obligatorio.',
                'price.required' => 'El campo Precio es obligatorio.',
            ]);
    
            $id = $validatedData['product_id'];  
            unset($validatedData['images']);
            unset($validatedData['product_id']);
            
            $product = Product::findOrFail($id);
            $product->update($validatedData);
 
            return redirect()->back()->with('success', 'Producto guardado correctamente.');
        } catch (Exception $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->with($errors);
        }
    }

}
