<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\Product\Price;

class Product extends Model
{
    public $casts = [
        'price' => Price::class
    ];
}
