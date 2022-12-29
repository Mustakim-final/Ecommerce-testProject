<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    protected $fillable = [
        'name',
        'description_short',
        'join_date',
        'man_image',
        'product_image',
        'man_status',
    ];
}
