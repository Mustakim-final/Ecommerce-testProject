<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'qty',
        'product_id',
        'product_name',
        'product_price',
        'product_image',
        'total',
        'users',
    ];
}
