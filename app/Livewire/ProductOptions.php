<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductAdditional;

class ProductOptions extends Component
{
    public $price = 100;
    public $id;
    public $tipos = [];
    public function render()
    {
        $adicionalesAgrupados = ProductAdditional::where('product_id',$this->id)->get()->groupBy('type');
        return view('livewire.product-options', compact('adicionalesAgrupados'));
    }
}
