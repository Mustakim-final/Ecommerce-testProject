<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table='categoris';
    protected $fillable = [
        'category_id',
        'category_name',
        'category_description',
        'status',
    ];
}
