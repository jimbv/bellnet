<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class servicesController extends Controller
{
    public function list()
    {
        $services = Service::all();
        return view('admin.services.list', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'name.required' => 'El campo Nombre es obligatorio.',
                'slug.required' => 'El campo Slug es obligatorio.',
                'description.required' => 'El campo Descripción es obligatorio.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
                'image.max' => 'La imagen no debe superar los 2048 KB.',
            ]);

            $image = $request->file('image');

            $service = Service::create($validatedData);

            if ($image) {
                $path = $image->store('imgs/service_images', 'publico');
                $service->update(['image' => $path]);
            }


            return redirect()->back()->with('success', 'Servicio guardado correctamente.');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->back()->withErrors($errors);
        }
    }


    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'El campo Nombre es obligatorio.',
            'slug.required' => 'El campo Slug es obligatorio.',
            'description.required' => 'El campo Description es obligatorio.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe superar los 2048 KB.',
        ]);
        $image = $request->file('image');

        $id = $request->service_id;
        $service = Service::findOrFail($id);

        if ($request->deleteImg == 1) {
            Storage::disk('publico')->delete($service->image);
            $service->update(['image' => '']);
        }

        if ($image) {
            $path = $image->store('imgs/service_images', 'publico');
            $service->update(['image' => $path]);
            unset($validatedData['image']);
        }

        $service->update($validatedData);
        return redirect()->back()->with('success', 'Servicio guardado correctamente.');
    }
}
