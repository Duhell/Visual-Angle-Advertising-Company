<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'FullName',
        'Email',
        'PhoneNumber',
        'Country',
        'Province',
        'City',
        'Street',
        'PostCode',
        'OrderDate',
        'OrderStatus',
        'OrderSubtotal',
        'OrderShippingFee',
        'OrderTotal'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            do{
                $random = strtoupper(Str::random(10));
                $exists = self::where('OrderTrackNumber', $random)->exists();
            }while($exists);
            $model->OrderTrackNumber = $random;
        });
    }
}
