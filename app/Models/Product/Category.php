<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        "name",
        "category_desc",
        "image",
        "icon",
    ];

    public $timestamps = true;
}
