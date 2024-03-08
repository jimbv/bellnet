<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductUploader extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $images = [];

    public function render()
    {
        return view('livewire.product-uploader');
    }

    public function saveProduct()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images.*' => 'image|max:2048', // Adjust image validation as needed
        ]);

        $product = Product::create($validatedData);

        foreach ($this->images as $image) {
            $path = $image->store('product_images', 'public');
            $product->images()->create(['image_path' => $path]);
        }

        // Clear form fields and images after saving
        $this->reset(['name', 'description', 'price', 'images']);
    }
}


