<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Category;
use App\Models\Product;

class Products extends Component
{
    use WithPagination;
    protected $products;
    public $category;


    public function mount()
    {
        if ($this->category != null) {
            $this->filtrar($this->category->id);
        }
    }

    public function render()
    {
        if ($this->category != null) {
            $productos = Product::where('category_id', $this->category->id)->paginate(9);
        } else {
            $productos = Product::paginate(9);
        }
        return view('livewire.products', ['categories' => Category::all(), 'productos' => $productos]);
    }

    public function filtrar($category_id)
    {
        $this->category = Category::find($category_id);
        $this->render();
    }

    public function redireccionar($category_id)
    {
        $this->category = Category::find($category_id);
        return redirect()->to('/categorias/' . $this->category->slug);
    }
}
