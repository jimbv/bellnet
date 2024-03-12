<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    public function list(){
        return view('admin.categories.list');
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'image.max' => 'La imagen no debe superar los 2048 KB.',
            ]);
            
            $image = $request->file('image');
            
            $category = Category::create($validatedData);
            
            if ($image) {
                $path = $image->store('imgs/category_images', 'publico');
                $category->update(['image' => $path]);
            }
            
            
            return redirect()->back()->with('success', 'Categoría guardada correctamente.');
        } catch (Exception $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with($errors);
        }
    }
}