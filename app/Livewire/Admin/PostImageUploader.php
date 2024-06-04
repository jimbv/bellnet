<?php
namespace App\Livewire\Admin;;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;

class PostImageUploader extends Component
{
    use WithFileUploads;

    public $images = [];
    public $post_id_temporal;
    public $post_id;
    public $post_images = [];

    public function render()
    {
        if ($this->post_id_temporal !== null) {
            $this->post_images = PostImage::where('post_id_temporal', $this->post_id_temporal)
                ->orderBy('order')
                ->get();
        } else {
            $this->post_images = PostImage::where('post_id', $this->post_id)
                ->orderBy('order')
                ->get();
        }
        return view('livewire.admin.post-image-uploader');
    }

    public function updatedImages()
    {
        $this->save();
    }

    public function save()
    {
        foreach ($this->images as $image) {
            $path = $image->store('imgs/post_images', 'publico'); 

            if ($this->post_id_temporal != null) { 
                PostImage::create(['image_path' => $path, 'post_id_temporal' => $this->post_id_temporal]);
            } else {
                PostImage::create(['image_path' => $path, 'post_id' => $this->post_id]);
            }
        } 
        $this->post_images = PostImage::where('post_id_temporal', $this->post_id_temporal)->orderBy('order')->get();
        $this->images = [];
    }

    public function updateOrder($ids)
    {
        foreach ($ids as $index => $id) {
            PostImage::where('id', $id)->update(['order' => $index + 1]);
        }
    }

    public function delete($id){

        $postImage = PostImage::findOrFail($id);
        Storage::delete($postImage->image_path);
        $postImage->delete();
        if ($this->post_id_temporal !== null) {
            $this->post_images = PostImage::where('post_id_temporal', $this->post_id_temporal)
                ->orderBy('order')
                ->get();
        } else {
            $this->post_images = PostImage::where('post_id', $this->post_id)
                ->orderBy('order')
                ->get();
        }
    }
}
