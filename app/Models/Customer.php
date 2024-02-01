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
        'OrderTotal',
        'AdditionalNotes'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            do{
                $random = str_shuffle(strtoupper(Str::random(10)) . rand(1000, 9999));
                $exists = self::where('OrderTrackNumber', $random)->exists();
            }while($exists);
            $model->OrderTrackNumber = $random;
        });
    }
}
