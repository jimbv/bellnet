<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url', 
    ];

    // Me fijo que modelo (producto o usuario) esta llamando a la imagen
    public function imageable(){
        return $this->morphTo();
    }

}
