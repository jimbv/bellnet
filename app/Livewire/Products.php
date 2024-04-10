<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Products extends Component
{
    public $products;
    public $category; 
    

    public function mount()
    {
        $this->products = Product::all();  
    }

    public function render()
    {
        $categories= Category::all();
        return view('livewire.products',compact('categories'));
    }

    public function filtrar($category_id)
    {
        $this->category = Category::find($category_id);
        $this->products = Product::where('category_id', $this->category->id)->get(); 
    }


}
