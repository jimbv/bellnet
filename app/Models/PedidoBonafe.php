<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoBonafe extends Model
{
    protected $table = 'pedidos_bonafe';
    use HasFactory;
    protected $fillable = ['cliente', 'estado', 'observaciones'];

    public function detalles()
    {
        return $this->hasMany(PedidoBonafeDetalle::class, 'pedido_bonafe_id');
    }
}
