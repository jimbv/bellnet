<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductAdditional; 

class ProductOptions extends Component
{
    public $price ;
    public $id;
    public $tipos = [];

    public function mount(){
        $this->price =  number_format(Product::find($this->id)->price, 0, '.', ',');
    }
    public function render()
    {
        $adicionalesAgrupados = ProductAdditional::where('product_id',$this->id)->get()->groupBy('type');
         

        return view('livewire.product-options', compact('adicionalesAgrupados'));
    }
}
