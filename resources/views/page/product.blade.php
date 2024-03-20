@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="jquery.jfMagnify.js"></script>
<script type="text/javascript">
    


			
</script>
@endsection
@section('styles')
<link href="/css/animations.css?v=1" rel="stylesheet">
<style>
   
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

            Productos /  <a href="/categoria/{{$product->category->slug}}" style="color: white;text-decoration:none;">{{$product->category->name}}</a> <br> <br>

            </div>
        </div>
        <div class="row">
                

                <div class="col-1">
                    @foreach($product->images as $img)
                    <img src="/{{$img->image_path}}" alt="{{$product->name}}" height="100px;" style="box-shadow: 5px 5px 10px;margin-bottom:4px;">
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="magnify">
                        <div class="magnify_glass"></div>
                        <div class="element_to_magnify">
                            <img src="/{{$product->images[0]->image_path}}" draggable="false" height="400px;" />
                        </div>
                    </div>
                    <!-- <img id="imagen" src="/{{$product->images[0]->image_path}}"  height="300px;" alt="Imagen" class="imagen" data-big="/{{$product->images[0]->image_path}}" />-->

 


                </div>
                <div class="col-7" style="text-shadow: none; color:white;">
                    {{$product->description}}

                </div>


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