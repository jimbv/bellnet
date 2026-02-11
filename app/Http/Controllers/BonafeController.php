<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoBonafe;
use App\Models\ProductoBonafe;
use App\Models\PedidoBonafeDetalle;
use Barryvdh\DomPDF\Facade\Pdf;


class BonafeController extends Controller
{
    public function form($cliente)
    {

        $pedido = PedidoBonafe::where('cliente', $cliente)
            ->where('estado', 'abierto')
            ->with('detalles') // 👈 importante
            ->first();

        if (!$pedido) {
            $pedido = PedidoBonafe::create([
                'cliente' => $cliente,
            ]);
        }

        $productos = ProductoBonafe::all();

        // Armamos array [producto_id => cantidad]
        $cantidades = $pedido->detalles
            ->pluck('cantidad', 'producto_id')
            ->toArray();

        return view('bonafe.form', compact('pedido', 'productos', 'cantidades'));
    }

    public function guardar(Request $request, $cliente)
    {
        $pedido = PedidoBonafe::where('cliente', $cliente)
            ->where('estado', 'abierto')
            ->firstOrFail();

        $pedido->observaciones = $request->observaciones;
        $pedido->save();

        $pedido->detalles()->delete();

        foreach ($request->productos as $productoId => $cantidad) {
            if ($cantidad > 0) {
                $producto = ProductoBonafe::find($productoId);

                PedidoBonafeDetalle::create([
                    'pedido_bonafe_id' => $pedido->id,
                    'producto_id' => $productoId,
                    'cantidad' => $cantidad,
                    'precio' => $producto->precio,
                ]);
            }
        }

        return back()->with('ok', 'Pedido guardado');
    }


    public function lista($cliente)
    {
        $pedidos = PedidoBonafe::where('cliente', $cliente)
            ->orderByDesc('created_at')
            ->take(30)
            ->get();

        return view('bonafe.lista', compact('pedidos', 'cliente'));
    }

    public function cambiarEstado(PedidoBonafe $pedido)
    {
        $pedido->estado = $pedido->estado === 'abierto' ? 'cerrado' : 'abierto';
        $pedido->save();

        return back();
    }
    public function eliminar(PedidoBonafe $pedido)
    {
        $pedido->delete();
        return back();
    }

    public function pdf(PedidoBonafe $pedido)
    {
        $pedido->load('detalles.producto');

        $pdf = Pdf::loadView('bonafe.pdf', compact('pedido'));

        return $pdf->download("pedido-{$pedido->id}.pdf");
    }
}
