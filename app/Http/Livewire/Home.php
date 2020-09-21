<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{

    public $products;

    public function mount()
    {

        $this->products = Product::orderBy('created_at', 'desc')->get();
    }


    public function render()
    {
        return view('livewire.home');
    }
}
