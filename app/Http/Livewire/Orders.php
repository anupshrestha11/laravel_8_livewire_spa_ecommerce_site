<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;


    public function readyToShip(Order $order, Product $product)
    {
        $order->products()->updateExistingPivot($product, ['status' => 'ready to ship']);

        $status = false;
        foreach ($order->products as $product) {
            if ($product->pivot->status == 'ready to ship') {
                $status = true;
            } else {
                $status = false;
                break;
            }
        }
        if ($status) {
            $order->status = 'ready to ship';
            $order->save();
        }
    }

    public function completed(Order $order)
    {
        $order->status = 'Completed';
        foreach ($order->products as $product) {
            $order->products()->updateExistingPivot($product, ['status' => 'Completed']);
        }
        $order->save();
    }


    public function render()
    {

        return view('livewire.orders', ['orders' => Order::orderBy('id', 'desc')->paginate(5)])->extends('layouts.dashboard');
    }
}
