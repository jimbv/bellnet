<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'color' => '',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'slug.required' => 'El campo Nombre es obligatorio.',
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


    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'slug.required' => 'El campo Nombre es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'image.max' => 'La imagen no debe superar los 2048 KB.',
            ]);

            $image = $request->file('image');

            $id = $request->category_id;
            $category = Category::findOrFail($id);

            if ($request->deleteImg == 1) {
                Storage::disk('publico')->delete($category->image);
                $category->update(['image' => '']);
            } 

            if ($image) {
                $path = $image->store('imgs/category_images', 'publico');
                $category->update(['image' => $path]);
                unset($validatedData['image']);
            }  

            $category->update($validatedData);


            return redirect()->back()->with('success', 'Categoría guardada correctamente.');
        } catch (Exception $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->with($errors);
        }
    }
}
