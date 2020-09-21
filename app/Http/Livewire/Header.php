<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $cartItems;

    protected $listeners = ['addtocart'];

    public function mount()
    {
        if (session()->get('cart')) {
            $this->cartItems = session()->get('cart');
        } else {
            $this->cartItems = [];
        }
    }

    public function addtocart($cartItem)
    {
        if (array_key_exists($cartItem[0], $this->cartItems)) {
            $this->cartItems[$cartItem[0]] += $cartItem[1];
        } else {
            $this->cartItems[$cartItem[0]] = $cartItem[1];
        }

        if (session()->has('cart')) {
            session()->put('cart', $this->cartItems);
        } else {
            session()->push("cart", $this->cartItems);
        }
    }

    public function sessionDelete()
    {
        session()->flush();
    }

    public function render()
    {
        return view('livewire.header');
    }
}
