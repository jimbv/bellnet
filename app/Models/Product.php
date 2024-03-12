<?php

namespace App\Models;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','category_id', 'description', 'technical_notes', 'price', 'images'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
