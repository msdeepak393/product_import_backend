<?php

namespace App\Models;

use App\Casts\Product\Price;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $casts = [
        'price' => Price::class,
    ];
}
