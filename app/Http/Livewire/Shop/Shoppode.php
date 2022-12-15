<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class Shoppode extends Component
{
    use WithPagination;
    public $pagesize=12;
    public function changepagesize($size)
    {
        $this->pagesize = $size;
    }
    public function render()
    {
        $shops = Product::paginate($this->pagesize);
        return view('livewire.shop.shoppode',['shops'=>$shops]);
    }
}
