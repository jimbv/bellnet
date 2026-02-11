<h2>Pedido Bonafé #{{ $pedido->id }}</h2>

<p><strong>Cliente:</strong> {{ $pedido->cliente }}</p>
<p><strong>Fecha:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Estado:</strong> {{ $pedido->estado }}</p>

<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp

        @foreach($pedido->detalles as $d)
            @php
                $subtotal = $d->cantidad * $d->precio;
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $d->producto->nombre }}</td>
                <td align="center">{{ $d->cantidad }}</td>
                <td align="right">$ {{ number_format($d->precio,2) }}</td>
                <td align="right">$ {{ number_format($subtotal,2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3>Total: $ {{ number_format($total,2) }}</h3>

@if($pedido->observaciones)
    <p><strong>Observaciones:</strong><br>
    {{ $pedido->observaciones }}</p>
@endif
