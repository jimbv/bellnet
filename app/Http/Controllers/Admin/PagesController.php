<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function list()
    {
        $pages = Page::all();
        return view('admin.pages.list', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function save(Request $request)
    {
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

        $page = Page::create($validatedData);

        if ($image) {
            $path = $image->store('imgs/page_images', 'publico');
            $page->update(['image' => $path]);
        }
        return redirect()->back()->with('success', 'Página guardada correctamente.');
    }


    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit', compact('page'));
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

        $id = $request->page_id;
        $page = Page::findOrFail($id); 

        if ($request->deleteImg == 1) {
            Storage::disk('publico')->delete($page->image);
            $page->update(['image' => '']);
        }

        if ($image) {
            $path = $image->store('imgs/page_images', 'publico');
            $page->update(['image' => $path]);
            unset($validatedData['image']);
        }

        $page->update($validatedData);
        return redirect()->back()->with('success', 'Página guardada correctamente.');
    }
}
