<?php

namespace App\Livewire\Admin;;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageUploader extends Component
{
    use WithFileUploads;

    public $images = [];
    public $product_id_temporal;
    public $product_images = [];

    

    public function render()
    {
        $product_images = ProductImage::where('product_id_temporal', $this->product_id_temporal)->orderBy('order')->get();
        return view('livewire.admin.product-image-uploader', compact('product_images'));
    }

    public function updatedImages()
    {
        $this->save();
    }


    public function save()
    {
        foreach ($this->images as $image) {
            $path = $image->store('imgs/product_images', 'publico');
            ProductImage::create(['image_path' => $path, 'product_id_temporal' => $this->product_id_temporal]);
        }
        $this->product_images = ProductImage::where('product_id_temporal', $this->product_id_temporal)->orderBy('order')->get();
        $this->images = [];
    }

    public function updateOrder($ids)
    {
        foreach ($ids as $index => $id) {
            ProductImage::where('id', $id)->update(['order' => $index + 1]);
        }
    }

    public function delete($id){

        $productImage = ProductImage::findOrFail($id);
        Storage::delete($productImage->image_path);
        $productImage->delete();
        $this->product_images = ProductImage::where('product_id_temporal', $this->product_id_temporal)->orderBy('order')->get();
    }
}
