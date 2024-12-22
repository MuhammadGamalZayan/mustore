<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = [
        "name",
        "price",
        "qty",
        "image",
        "pro_id",
        "user_id",
        "subtotal",
    ];

    public $timestaps = true;
}
