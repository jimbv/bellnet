<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoBonafe extends Model
{
    use HasFactory;
    protected $table = 'productos_bonafe';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

    public function detalles()
    {
        return $this->hasMany(PedidoBonafeDetalle::class, 'producto_id');
    }
}
