<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'Voucher_Name',
        'Voucher_Expiry',
        'Voucher_Value'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            do{
                $randomVoucherCode = 'VISUAL'.str_shuffle(strtoupper(Str::random(5)).rand(1000, 9999).strtoupper(Str::random(8)));

                $exists_VoucherCode = self::where('Voucher_Code', $randomVoucherCode)->exists();

            }while($exists_VoucherCode);

            $model->Voucher_Code = $randomVoucherCode;
        });
    }



}
