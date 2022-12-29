<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'shipping_email',
        'shipping_fast_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_city',
    ];
}
