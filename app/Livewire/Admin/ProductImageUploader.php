<?php

namespace App\Livewire\Admin;;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Laravel\Facades\Image; 
use Intervention\Image\ImageManager;

class ProductImageUploader extends Component
{
     
    use WithFileUploads;

    public $images = [];
    public $product_id_temporal;
    public $product_id;
    public $product_images = [];

    

    public function render()
    {
        if ($this->product_id_temporal !== null) {
            $this->product_images = ProductImage::where('product_id_temporal', $this->product_id_temporal)
                ->orderBy('order')
                ->get();
        } else {
            $this->product_images = ProductImage::where('product_id', $this->product_id)
                ->orderBy('order')
                ->get();
        }
         
        return view('livewire.admin.product-image-uploader');
    }

    public function updatedImages()
    {
        $this->save();
    }


    public function save()
    {
        foreach ($this->images as $image) {
            $path = $image->store('imgs/product_images', 'publico'); 

            if ($this->product_id_temporal !== null) {
                ProductImage::create(['image_path' => $path, 'product_id_temporal' => $this->product_id_temporal]);
            } else {
                ProductImage::create(['image_path' => $path, 'product_id' => $this->product_id]);
            }
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
        if ($this->product_id_temporal !== null) {
            $this->product_images = ProductImage::where('product_id_temporal', $this->product_id_temporal)
                ->orderBy('order')
                ->get();
        } else {
            $this->product_images = ProductImage::where('product_id', $this->product_id)
                ->orderBy('order')
                ->get();
        }
    }
}
