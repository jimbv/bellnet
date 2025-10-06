<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkImages;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkImagesController extends Controller
{
    public function list()
    {
        $work_images = WorkImages::all();
        return view('admin.work_images.list', compact('work_images'));
    }

    public function create()
    {
        return view('admin.work_images.create');
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'text' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'title.required' => 'El campo Título es obligatorio.',
                'text.required' => 'El campo Texto es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'image.max' => 'La imagen no debe superar los 2048 KB.',
            ]);

            $image = $request->file('image');

            $work_images = WorkImages::create($validatedData);

            if ($image) {
                $path = $image->store('imgs/work_images', 'publico');
                $work_images->update(['image' => $path]);
            }


            return redirect()->back()->with('success', 'Imagen de trabajo guardada correctamente.');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with($errors);
        }
    }


    public function delete($id)
    {
        $work_images = WorkImages::find($id);
        $work_images->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $work_image = WorkImages::find($id);
        return view('admin.work_images.edit', compact('work_image'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'text' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'title.required' => 'El campo Título es obligatorio.',
                'text.required' => 'El campo Texto es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'image.max' => 'La imagen no debe superar los 2048 KB.',
            ]);

            $image = $request->file('image');
 
            $id = $request->work_image_id;
            $work_images = WorkImages::findOrFail($id);

            if ($request->deleteImg == 1) {
                Storage::disk('publico')->delete($work_images->image);
                $work_images->update(['image' => '']);
            }

            if ($image) {
                $path = $image->store('imgs/work_images', 'publico');
                $work_images->update(['image' => $path]);
                unset($validatedData['image']);
            }
 
            $work_images->update($validatedData); 


            return redirect()->back()->with('success', 'Trabajo guardado correctamente.');
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->withErrors($errors);
        }
    }
}
