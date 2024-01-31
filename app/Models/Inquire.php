<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    protected $fillable = [
        'FullName',
        'Email',
        'PhoneNumber',
        'Message'
    ];
}
