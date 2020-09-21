<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{

    public $cartItems = [];

    public $products = [];

    public $subtotals = 0;



    public function increment($id)
    {
        $this->cartItems[$id]++;
        session()->put('cart', $this->cartItems);
    }
    public function decrement($id)
    {
        if ($this->cartItems[$id] > 1) {
            $this->cartItems[$id]--;
            session()->put('cart', $this->cartItems);
        }
    }

    public function remove($id)
    {
        unset($this->cartItems[$id]);
        session()->put('cart', $this->cartItems);
    }

    public function render()
    {
        $this->subtotals = 0;
        $this->cartItems = session()->get('cart');
        foreach ($this->cartItems as $key => $value) {
            $product = Product::find($key);
            $this->products = [...$this->products, $product];
            $this->subtotals = $this->subtotals + ($product->price * $value);
        }

        return view('livewire.cart');
    }
}
