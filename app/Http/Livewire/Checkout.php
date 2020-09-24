<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{

    public $cartItems = [];
    public $products = [];
    public $subtotals = 0;

    public $form = [
        'name' => '',
        'email' => '',
        'address' => '',
        'phone' => ''
    ];

    public $rules = [
        'form.name' => 'required',
        'form.email' => 'required|email',
        'form.address' => 'required',
        'form.phone' => 'required|numeric',
    ];

    public function submit()
    {
        $this->validate();
        $order = Order::create($this->form);
        $this->cartItems = session()->get('cart');

        foreach ($this->cartItems as $key => $value) {
            $order->products()->attach(Product::find($key), [
                'quantity' => $value
            ]);
        }




        $this->form = [
            'name' => '',
            'email' => '',
            'address' => '',
            'phone' => ''
        ];
        session()->forget('cart');
        $this->cartItems = [];
        $this->products = [];

        return redirect()->to(route('thankyou'));
    }


    public function render()
    {
        if (session()->has('cart')) {
            $this->subtotals = 0;
            $this->cartItems = session()->get('cart');
            foreach ($this->cartItems as $key => $value) {
                $product = Product::find($key);
                $this->products = [...$this->products, $product];
                $this->subtotals = $this->subtotals + ($product->price * $value);
            }
        }

        return view('livewire.checkout');
    }
}
