<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class PostsController extends Controller
{
    public function list()
    {
        $posts = Post::all();
        return view('admin.posts.list', compact('posts'));
    }

    public function create()
    {
        $post_id_temporal = Uuid::uuid4()->toString();
        return view('admin.posts.create', compact('post_id_temporal'));
    }

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'slug' => 'required|string',
                'short_text' => 'required|string',
                'text' => 'required|string',
                'post_id_temporal' => 'required'
            ], [
                'title.required' => 'El campo título es obligatorio.',
                'slug.required' => 'El campo título es obligatorio.',
                'short_text.required' => 'El campo texto corto es obligatorio.',
                'text.required' => 'El campo texto es obligatorio.',
            ]);


            $id_temporal = $validatedData['post_id_temporal']; 
            unset($validatedData['post_id_temporal']);
    
            $post = Post::create($validatedData);

            PostImage::where('post_id_temporal', $id_temporal)
            ->update(['post_id' => $post->id, 'post_id_temporal' => null]);

            return redirect()->back()->with('success', 'Post guardado correctamente.');
        } catch (Exception $e) {
            $errors = $e->validator->errors()->all();
            return redirect()->back()->with($errors);
        }
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        try { 
            $validatedData = $request->validate([
                'title' => 'required|string',
                'slug' => 'required|string',
                'short_text' => 'required|string',
                'text' => 'required|string', 
                'post_id' => 'required',
            ], [
                'title.required' => 'El campo Título es obligatorio.',
                'slug.required' => 'El campo Título es obligatorio.',
                'short_text.required' => 'El campo texto corto es obligatorio.',
                'text.required' => 'El campo Texto es obligatorio.', 
            ]);

            $id = $validatedData['post_id'];
            unset($validatedData['images']);
            unset($validatedData['product_id']);

            $post = Post::findOrFail($id);
            $post->update($validatedData);

            return redirect()->back()->with('success', 'Noticia guardada correctamente.');
        } catch (Exception $e) {
            // Manejar la excepción de validación
            $errors = $e->validator->errors()->all();
            // Manejar la excepción, por ejemplo, mostrar un mensaje de error
            return redirect()->back()->with($errors);
        }
    }
}
