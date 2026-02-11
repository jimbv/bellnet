<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedidos {{ $cliente }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <h3 class="mb-4">📦 Últimos pedidos de {{ ucfirst($cliente) }}</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">

    <a href="{{ '/bonafe/'.$cliente }}"
       class="btn">
        ← Volver al pedido abierto
    </a> 

</div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th width="300">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <span class="badge bg-{{ $pedido->estado === 'abierto' ? 'success' : 'secondary' }}">
                            {{ $pedido->estado }}
                        </span>
                    </td>
                    <td class="d-flex gap-2">

                        {{-- Cambiar estado --}}
                        <form method="POST" action="{{ url('bonafe/pedido/'.$pedido->id.'/estado') }}">
                            @csrf
                            <button class="btn btn-sm btn-warning">
                                {{ $pedido->estado === 'abierto' ? 'Cerrar' : 'Abrir' }}
                            </button>
                        </form>

                        {{-- PDF --}}
                        <a href="{{ url('bonafe/pedido/'.$pedido->id.'/pdf') }}"
                           class="btn btn-sm btn-danger">
                            PDF
                        </a>

                        {{-- Eliminar --}}
                        <form method="POST" action="{{ url('bonafe/pedido/'.$pedido->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Eliminar pedido?')">
                                Eliminar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
