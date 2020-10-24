<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    protected $table = "localidades"; 

    public function provincia()
    {
        return $this->belogsTo('App\Provincia');
    }

    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
    
}
