<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    use HasFactory;
    
    protected $table = "product_user"; 

    protected $fillable = [
        'product_id','user_id','desde', 'hasta' 
    ];
    
    public function producto()
    {
        return $this->belogsTo('App\Product');
    }

}