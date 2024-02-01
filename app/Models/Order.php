<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'Product',
        'Quantity',
        'Price',
        'SubTotal',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            do{
                $random = Uuid::uuid4();
                $exists = self::where('Order_uuid', $random)->exists();
            }while($exists);
            $model->Order_uuid = $random;
        });
    }
}
