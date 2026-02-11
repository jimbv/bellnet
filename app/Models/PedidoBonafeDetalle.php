<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PedidoBonafeDetalle extends Model
{
    use HasFactory;
    protected $table = 'pedido_bonafe_detalles';

    protected $fillable = [
        'pedido_bonafe_id',
        'producto_id',
        'cantidad',
        'precio',
        'subtotal',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'precio' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function pedidoBonafe()
    {
        return $this->belongsTo(PedidoBonafe::class);
    }

    public function producto()
    {
        return $this->belongsTo(ProductoBonafe::class);
    }
}
