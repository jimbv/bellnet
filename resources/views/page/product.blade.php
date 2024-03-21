@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript">




</script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
<style>
    .contenedor {

        background-color: gray;
        width: 400px;
        /* Ancho deseado */
        height: 400px;
        /* Altura deseada */
        overflow: hidden;
        /* Oculta el contenido que desborda */
        position: relative;
        /* Necesario para centrar verticalmente */
    }

    .contenedor_min {

        background-color: gray;
        width: 100px;
        /* Ancho deseado */
        height: 100px;
        /* Altura deseada */
        overflow: hidden;
        /* Oculta el contenido que desborda */
        position: relative;
        /* Necesario para centrar verticalmente */
    }

    .contenedor img {
        width: 100%;
        height: auto;
        object-fit: cover;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .contenedor_min img {
        width: 100%;
        height: auto;
        object-fit: cover;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection
@section('content')
<section>
    <div class="products ">
        <p></p>&nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp;
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12" style="color:white;text-shadow:none;">

                    <h1>{{$product->name}}</h1>

                    Productos / <a href="/categorias/{{$product->category->slug}}" style="color: white;text-decoration:none;">{{$product->category->name}}</a> <br> <br>

                </div>
            </div>
            <div class="row">


                <div class="col-1">
                    @foreach($product->images as $img)
                    <div class="contenedor_min">
                        <img src="/{{$img->image_path}}" alt="{{$product->name}}" height="100px;" style="box-shadow: 5px 5px 10px;margin-bottom:4px;">
                    </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="contenedor">
                        <img src="/{{$product->images[0]->image_path}}" height="400px;" draggable="false" />
                    </div>
                </div>
                <div class="col-7" style="text-shadow: none; color:white;">
                    {!!$product->description!!}

                </div>
                @if($product->technical_notes!=null)
                <div class="col-12" style="text-shadow: none; color:white;">
                <br>
                    <h2 style="font-weight: bold;">DATOS TECNICOS</h2>
                    <hr>
                    {!!$product->technical_notes!!}

                </div>
                @endif


            </div>


        </div>
        <br>
    </div>
</section>

<script>
    const zoomImage = document.getElementById('zoom-image');
    const zoomLoupe = document.querySelector('.zoom-loupe');

    zoomImage.addEventListener('mousemove', function(event) {
        const x = event.offsetX; // Posición del cursor dentro de la imagen
        const y = event.offsetY;

        const bgX = x - zoomLoupe.offsetWidth / 2; // Ajustamos la posición de la lupa
        const bgY = y - zoomLoupe.offsetHeight / 2;

        zoomLoupe.style.backgroundImage = `url('${zoomImage.src}')`;
        zoomLoupe.style.backgroundPosition = `-${bgX}px -${bgY}px`;
        zoomLoupe.style.visibility = 'visible';
    });

    zoomImage.addEventListener('mouseleave', function() {
        zoomLoupe.style.visibility = 'hidden';
    });
</script>
@endsection