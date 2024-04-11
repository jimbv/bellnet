<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Enums\AdditionalType;
use App\Models\ProductAdditional;

class ProductAdditionals extends Component
{
    public $types;
    public $product_id;
    public $product_id_temporal;
    public $additional_name;
    public $additional_type;
    public $additional_price;
    public $product_additionals = [];


    public function mount()
    {
        $this->types = AdditionalType::getTypes();
        $this->additional_type = array_key_first($this->types);
    }
    public function render()
    {
        if ($this->product_id_temporal !== null) {
            $this->product_additionals = ProductAdditional::where('product_id_temporal', $this->product_id_temporal)->orderBy('type')->get();
        } else {
            $this->product_additionals = ProductAdditional::where('product_id', $this->product_id)->orderBy('type')->get();
        }

        return view('livewire.admin.product-additionals');
    }


    public function save()
    {
        if ($this->product_id_temporal !== null) {
            ProductAdditional::create([
                'name' => $this->additional_name,
                'price' =>  $this->additional_price,
                'type' =>  $this->additional_type,
                'product_id_temporal' => $this->product_id_temporal
            ]);
            $this->product_additionals = ProductAdditional::where('product_id_temporal', $this->product_id_temporal)->orderBy('type')->get();
        }else{
            ProductAdditional::create([
                'name' => $this->additional_name,
                'price' =>  $this->additional_price,
                'type' =>  $this->additional_type,
                'product_id' => $this->product_id
            ]);
            $this->product_additionals = ProductAdditional::where('product_id', $this->product_id)->orderBy('type')->get();
        }

        $this->additional_name = '';
        $this->additional_price = '';
        
    }


    public function delete($id)
    {
        $productAdditional = ProductAdditional::findOrFail($id);
        $productAdditional->delete();
        if ($this->product_id_temporal !== null) {
            $this->product_additionals = ProductAdditional::where('product_id_temporal', $this->product_id_temporal)->orderBy('type')->get();
        } else {
            $this->product_additionals = ProductAdditional::where('product_id', $this->product_id)->orderBy('type')->get();
        }
    }
}
