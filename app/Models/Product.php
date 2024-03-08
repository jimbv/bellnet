<?php

namespace App\Models;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'images'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
