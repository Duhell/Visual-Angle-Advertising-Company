<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'Product',
        'Quantity',
        'Price',
        'SubTotal',
    ];
}
