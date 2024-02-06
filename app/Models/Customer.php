<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

class Customer extends Model
{
    use HasFactory;
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
        'OrderVoucher',
        'AdditionalNotes'
    ];

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class,'Customer_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            do{
                $randomTrackNumber = str_shuffle(strtoupper(Str::random(10)) . rand(1000, 9999));
                $randomUuid = Uuid::uuid4();

                $exists_TrackNumber = self::where('OrderTrackNumber', $randomTrackNumber)->exists();
                $exists_randomUuid = self::where('Customer_uuid', $randomUuid)->exists();

            }while($exists_TrackNumber || $exists_randomUuid);

            $model->OrderTrackNumber = $randomTrackNumber;
            $model->Customer_uuid = $randomUuid;
        });
    }
}
