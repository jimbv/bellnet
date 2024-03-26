@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
<style>
    .contenedor {
        background-color: gray;
        width: 380px;
        min-height: 380px;
        overflow: hidden;
        position: relative;
    }

    .contenedor_min {
        display: inline-block;
        background-color: gray;
        width: 100px; 
        height: 100px; 
        overflow: hidden; 
        position: relative; 
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
                <div class="col-md-12" style="color:white;text-shadow:none;">

                    <h1>{{$product->name}}</h1>

                    <a href="/productos/" style="color: white;text-decoration:none;"> Productos </a> /
                    <a href="/categorias/{{$product->category->slug}}" style="color: white;text-decoration:none;">{{$product->category->name}}</a> <br> <br>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    @livewire('product-images',['images' => $product->images])
                </div>
                <div class="col-md-4" style="text-shadow: none; color:white;padding-left:30px;">
                    {!!$product->description!!}
                </div>
                <div class="col-md-3" style="text-shadow: none; color:white;padding-left:30px;">

                    @livewire('product-options', ['id' => $product->id])

                </div>
                @if($product->technical_notes!=null)
                <div class="col-md-12" style="text-shadow: none; color:white;padding:30px;">
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