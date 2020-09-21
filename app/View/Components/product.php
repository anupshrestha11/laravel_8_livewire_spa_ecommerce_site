<?php

namespace App\View\Components;

use App\Models\Product as ModelsProduct;
use Illuminate\View\Component;

class product extends Component
{

    public ModelsProduct $product;


    public function __construct($product)
    {
        $this->product = $product;
    }




    public function render()
    {
        return view('components.product');
    }
}
