<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAdditional extends Model
{
    protected $fillable = ['product_id', 'price', 'type', 'name', 'product_id_temporal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
