<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'manufacture_id',
        'product_short_description',
        'product_long_description',
        'product_price',
        'product_image',
        'product_size',
        'product_color',
        'publication_status',
    ];

    public function maufacture()
    {
        return $this->belongsTo(Manufacture::class,'manufacture_id');
    }
}
