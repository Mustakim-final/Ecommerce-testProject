<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'manufacture_name',
        'manufacture_description',
        'manufacture_status',
    ];
}
