<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    // * specify table
    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'quantity'];
}
