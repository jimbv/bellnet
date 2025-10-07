<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{
    public function list()
    {
        $testimonials = Testimony::all();
        return view('admin.testimonials.list', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function save(Request $request)
    {

        $validatedData = $request->validate([
            'client' => 'required|string',
            'review' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'client.required' => 'El campo Cliente es obligatorio.',
            'review.required' => 'El campo Texto es obligatorio.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe superar los 2048 KB.',
        ]);

        $image = $request->file('image');

        $testimony = Testimony::create($validatedData);

        if ($image) {
            $path = $image->store('imgs/testimony_images', 'publico');
            $testimony->update(['image' => $path]);
        }


        return redirect()->back()->with('success', 'Testimonio guardado correctamente.');
    }


    public function delete($id)
    {
        $testimony = Testimony::find($id);
        $testimony->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $testimony = Testimony::find($id);
        return view('admin.testimonials.edit', compact('testimony'));
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'client' => 'required|string',
            'review' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'client.required' => 'El campo Cliente es obligatorio.',
            'review.required' => 'El campo Texto es obligatorio.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'El archivo debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe superar los 2048 KB.',
        ]);

        $image = $request->file('image');

        $id = $request->testimony_id;
        $testimony = Testimony::findOrFail($id);

        if ($request->deleteImg == 1) {
            Storage::disk('publico')->delete($testimony->image);
            $testimony->update(['image' => '']);
        }

        if ($image) {
            $path = $image->store('imgs/testimony_images', 'publico');
            $testimony->update(['image' => $path]);
            unset($validatedData['image']);
        }

        $testimony->update($validatedData);
        return redirect()->back()->with('success', 'Testimonio guardado correctamente.');
    }
}
