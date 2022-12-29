<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandsProduct extends Model
{
    protected $fillable = [
        'brand_id',
        'product_name',
        'description_short',
        'description_long',
        'product_price',
        'product_image',
        'product_size',
        'product_color',
        'publication_status',
    ];
}
