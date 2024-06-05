<?php

namespace App\Livewire;

use Livewire\Component;

class ProductImages extends Component
{
    public $images;
    public $selected_image;

    public function mount()
    {
        $this->selected_image = $this->images[0]->image_path;
    }
    
    public function render()
    {
        return view('livewire.product-images');
    }

    public function seleccionar($image)
    {
         $this->selected_image = $image;
    }
}
