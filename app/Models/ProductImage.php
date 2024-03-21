<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image_path', 'product_id_temporal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
