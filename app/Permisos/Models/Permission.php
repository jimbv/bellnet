<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'slug', 'descripcion' 
    ];

    public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Role')->withTimesTamps();
    }

}
