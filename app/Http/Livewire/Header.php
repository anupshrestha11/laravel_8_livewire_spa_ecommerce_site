<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $cartItems = [];

    protected $listeners = ['addtocart', 'checkCart'];


    public function addtocart($cartItem)
    {
        if (session()->has('cart')) {
            $this->cartItems = session()->get('cart');
        } else {
            $this->cartItems = [];
        }

        if (array_key_exists($cartItem[0], $this->cartItems)) {
            $this->cartItems[$cartItem[0]] += $cartItem[1];
        } else {
            $this->cartItems[$cartItem[0]] = $cartItem[1];
        }
        session()->put("cart", $this->cartItems);
    }

    public function checkCart()
    {

        $this->cartItems = session()->get('cart');
    }

    public function sessionDelete()
    {
        session()->flush();
    }

    public function render()
    {
        $this->cartItems = [];
        if (session()->has('cart')) {
            $this->cartItems = session()->get('cart');
        }
        return view('livewire.header');
    }
}
