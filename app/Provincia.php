<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    //
    public function localidades()
    {
        return $this->hasMany('App\Localidad');
    }
 
    
}
