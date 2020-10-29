<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'slug', 'descripcion','acceso-total'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }
}
