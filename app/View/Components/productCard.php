<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class productCard extends Component
{

    public Product $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('components.product-card');
    }
}
