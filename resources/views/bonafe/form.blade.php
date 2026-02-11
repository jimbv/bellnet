<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedido Bonafe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #055444;
        }

        .card-producto {
            transition: transform .2s;
        }

        .card-producto:hover {
            transform: scale(1.02);
        }
    </style>
</head>

<body>


    <div class="container py-4">
        <div class="text-center text-white mb-4">
            <h2>Pedido Bonafé</h2>
            <p>Cliente: <strong>{{ ucfirst($pedido->cliente) }}</strong></p>
        </div>

        @if(session('ok'))
        <div class="alert alert-success text-center">
            {{ session('ok') }}
        </div>
        @endif

        <form method="POST">
            @csrf

            <div class="row g-3">
                @foreach($productos as $producto)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card card-producto h-100 shadow-sm">

                        @if($producto->imagen)
                        <div class="bg-white d-flex align-items-center justify-content-center p-2"
                            style="height:220px;">
                            <img src="{{ asset('/bonafe/'.$producto->imagen) }}"
                                style="max-height:100%; max-width:100%; object-fit:contain;">
                        </div>
                        @else
                        <div class="bg-white d-flex align-items-center justify-content-center"
                            style="height:220px;">
                            <span>Sin imagen</span>
                        </div>
                        @endif

                        <div class="card-body text-center d-flex flex-column">

                            <h6 class="card-title small mb-2">
                                {{ $producto->nombre }}
                            </h6>

                            <div class="fw-bold text-success mb-2">
                                $ {{ number_format($producto->precio, 2) }}
                            </div>

                            <div class="d-flex justify-content-center mt-auto">
                                <input
                                    type="number"
                                    min="0"
                                    name="productos[{{ $producto->id }}]"
                                    value="{{ $cantidades[$producto->id] ?? 0 }}"
                                    class="form-control form-control-sm text-center"
                                    style="width:80px;">
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="mt-4">
                <label class="form-label text-white">Observaciones</label>
                <textarea
                    name="observaciones"
                    class="form-control"
                    rows="3"
                    placeholder="Ej: Entregar el viernes, pagar en efectivo..."></textarea>
            </div>

            <div class="text-center mt-4 d-flex justify-content-center gap-3 flex-wrap">

                <button type="submit" class="btn btn-warning btn-lg px-5">
                    Guardar pedido
                </button>

                <a href="{{ url('bonafe/'.$pedido->cliente.'/lista') }}"
                    class="btn btn-outline-light btn-lg px-5">
                    Ver lista
                </a>

            </div>


        </form>
    </div>

</body>

</html>