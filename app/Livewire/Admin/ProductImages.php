<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Category;

class ProductImages extends Component
{
    public $products,$category;

    public function mount()
    {
        $this->products = Product::all(); 
    }

    public function render()
    {
        $categories= Category::all();
        return view('livewire.products',compact('categories'));
    }

    public function filtrar($category_id){
        $this->category = Category::where('id', $category_id)->first(); 
        $this->products = Product::where('category_id', $this->category->id)->get();
    }

}
