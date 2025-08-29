@extends('layouts.template')
@section('header')

@endsection

@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<!-- Carrousel-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
  $(document).ready(function() {
    $('.full-screen-carousel').slick({
      arrows: false,
      infinite: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 3000,
      fade: true,
      cssEase: 'linear',
      pauseOnHover: false,
    });

    $(".carousel").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      dataVariableWidth: false,
      dots: false,
      responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.carousel img').on('click', function() {
      var src = $(this).attr('src');
      var title = $(this).attr('data-title');
      $('#modalImage').attr('src', src);
      $('#imageModalLabel').text(title);
      $('#imageModal').modal('show');
    });
  });
</script>

@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
<link href="/css/galeria.css?v=4" rel="stylesheet">
<style>
  body,
  html {
    margin: 0;
    padding: 0;
  }

  .video-container {
    width: 100vw;
    height: 100vh;
    /* ocupa todo lo que se ve */
    overflow: hidden;
    position: relative;
  }

  .video-container video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* se ajusta al tamaño del contenedor */
  }
</style>
@endsection
@section('content')

<section>

  
  <div class="video-container">
    <video autoplay muted loop playsinline>
      <source src="/videos/video.mp4" type="video/mp4">
      <source src="/videos/video.webm" type="video/webm">
      Tu navegador no soporta la reproducción de video.
    </video>
  </div>


</section>
@php
$fecha_actual = \Carbon\Carbon::now();
$fecha_actual_mas_3_dias = \Carbon\Carbon::now()->addDays(3);
@endphp

@if ($fecha_actual->lessThan($fecha_actual_mas_3_dias))
{{--
<section>
  <div class="products text-center f-width pb-5">
    <img src="imgs/promociones/descuento.jpg" style="max-width: 100%;">
  </div>
</section> --}}
@endif

<section>
  <div class="products text-center f-width">
    <h2 style="position:relative;color:white;text-shadow:none;width: 100%;">PRODUCTOS</h2>

    <div id="galeria" style="margin: auto;">
      @foreach($categories as $key => $cat)
      <a class="anim-fade-in " href="/categorias/{{$cat->slug}}/" style="float:left;">
        <div class="categoria">
          <div class="marco_imagen">

            <div class="image">
              <img src="/{{ $cat->image }}" alt="{{$cat->name}}" style='width:100%;'>
            </div>
          </div>
          <div class="degradado_imagen">


          </div>

          <div class="marco_titulo">
            <div style="color:white;letter-spacing: 0.2em">

              {{strtoupper($cat->name)}}

            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>

    <br>

    <div id="obras" class="paused">
      <div class="container text-center anim-up" style="font-size: 16px;color:white;">
        <a href="/productos" style="text-decoration:none;">
          <div style="color:white; border-radius: 3px 0 0 3px; width:40px; display:inline-block;">
            <i class="fa fa-plus" aria-hidden="true"></i>
          </div>
          <div style="color:white;border-radius: 0 3px 3px 0;  width:150px; display:inline-block;">
            Ver más productos
          </div>
      </div>
      <br>
      </a><br>
    </div>
  </div>
</section>


<section style="background: rgb(2, 2, 2);" class="p-3">
  <div class="container text-center anim-down mt-5"> <br>
    <h2 style="color:white;">SERVICIOS</h2>
    <p></p> <br>
  </div>

  <div class="container">
    <div class="carousel">
      @foreach($work_images as $work)
      <div class="item" style="text-align: center; ">
        <img src="{{$work->image}}" alt="{{$work->title}}" data-title="{{$work->title}}" style='display:inline-block;max-height:200px;width:auto;border: 1px solid white; border-radius:3px; box-shadow:0px 0px 8px white;'>
      </div>
      @endforeach
    </div>
    <div id="contacto" style="height: 90px;width:100%;"></div>
  </div>



  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="box-shadow: 0px 0px 10px white;overflow:hidden;">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel" style="padding: 0px;">Image Title</h5>
          <button type="button" class="close" data-dismiss="modal" onclick="
        $('#imageModal').modal('hide');" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="padding: 0px;">
          <img src="" alt="" id="modalImage" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


</section>

<!-- Contact form -->
<section style="background: rgb(81, 85, 99);" class="paused">
  <div class="container contacto">
    <div class="portada">
      <div class="fondo">
      </div>
      <div class="degradado"></div>
      <div class="degradado2"></div>
      <div style="position: absolute;top:0px;width:100%;padding-top:70px;">
        <h2 style="color:white;">CONTACTO</h2>
      </div>

    </div>
    <div class="row" style="position: relative; top:-100px;">
      <div class="col-lg-8 col-md-6 col-sm-12 offset-lg-2 offset-md-3">
        <div class="anim-up" style="background: white;margin-left:10px;margin-right:10px;color:black;padding:20px;height:100%;">
          <h3>Dejanos tu consulta</h3>
          <hr>
          @if(session('success'))
          <br>
          <div class="alert alert-success anim-up">
            {{ session('success') }}
          </div>
          @else
          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group anim-pause-1 anim-up">
              <label for="name">Nombre y Apellido:</label>
              <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="form-group  anim-pause-2 anim-up">
              <label for="email">Correo electrónico:</label>
              <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group  anim-pause-3 anim-up">
              <label for="email">Teléfono / Celular:</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}" required>
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>

            <div class="form-group anim-pause-4 anim-up">
              <label for="message">Mensaje:</label>
              <textarea name="message" id="message" rows="5" class="form-control" required>{{old('message')}}</textarea>
              @if ($errors->has('message'))
              <span class="text-danger">{{ $errors->first('message') }}</span>
              @endif
            </div>
            <div class="form-group anim-up">
              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
              @if ($errors->has('g-recaptcha-response'))
              <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
              @endif
            </div>
            <br>
            <button type="submit" class="btn btn-dark regencie anim-pause-5 anim-up">Enviar mensaje</button>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>

</section>

@endsection