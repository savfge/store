<?php

namespace App\Http\Livewire\Shop;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
class Blogshop extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = Blog::paginate('9');
        
        return view('livewire.shop.blogshop',['blogs'=>$blogs]);
    }
}
