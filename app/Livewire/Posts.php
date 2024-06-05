<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Post;

class Posts extends Component
{
    use WithPagination;
    protected $posts;

    public function mount()
    { 
    }

    public function render()
    {
        $posts = Post::paginate(9);
        return view('livewire.posts', ['posts' => $posts]);
    }
}
