@extends('layouts.template')
@section('header')

@endsection


@section('scripts')
<script src="/js/animations.js"></script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
<link href="/css/galeria.css?v=2" rel="stylesheet">
@endsection
@section('content')

<style>
  .carousel-item {
    height: 100vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
</style>
<section>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('/imgs/slider/slider1.jpg')">
        <div class="carousel-caption">
          <h5>Lámpara de pié infinito</h5>
          <h6>Diseño para tus espacios</h6>
        </div>
      </div>

      <div class="carousel-item active" style="background-image: url('/imgs/slider/slider2.jpg')">
        <div class="carousel-caption">
          <h5>Lámpara de pié infinito</h5>
          <h6>Diseño para tus espacios</h6>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/imgs/slider/colgante.png')">
        <div class="carousel-caption">
          <h5>Colgante</h5>
          <h6>Diseño para tus espacios</h6>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

</section>

<section>
  <div class="products text-center">
    <h2 style="color:white;text-shadow:none;">PRODUCTOS</h2>

<div id="galeria" class="paused">
  @foreach($categories as $key => $cat)
  <a class="anim-fade-in " href="/categorias/{{$cat->slug}}/" style="float:left">
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

<div id="contacto" class="paused">
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

<!-- Contact form -->
<section style="background: radial-gradient(circle at 10% 20%, rgb(90, 92, 106) 0%, rgb(32, 45, 58) 81.3%);" class="paused">
  <div class="container contacto p-3">
    <br>
    <p></p>
    <div class="row">

      <div class="col-lg-8 col-md-6 col-sm-12 mb-3">
        <div class="anim-left" style="background: linear-gradient(180.2deg, rgb(30, 33, 48) 6.8%, rgb(74, 98, 110) 131%);margin-left:10px;margin-right:10px;color:white;padding:20px;height:100%;">
          <h2>CONTACTO</h2>
          <hr>

          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group anim-pause-1 anim-left">
              <label for="name">Nombre y Apellido:</label>
              <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="form-group  anim-pause-2 anim-left">
              <label for="email">Correo electrónico:</label>
              <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group  anim-pause-3 anim-left">
              <label for="email">Teléfono / Celular:</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}" required>
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>

            <div class="form-group anim-pause-4 anim-left">
              <label for="message">Mensaje:</label>
              <textarea name="message" id="message" rows="5" class="form-control" required>{{old('message')}}</textarea>
              @if ($errors->has('message'))
              <span class="text-danger">{{ $errors->first('message') }}</span>
              @endif
            </div>
            <div class="form-group anim-left">
              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
              @if ($errors->has('g-recaptcha-response'))
              <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
              @endif
            </div>
            <br>
            <button type="submit" class="btn btn-dark regencie anim-pause-5 anim-left">Enviar mensaje</button>
          </form>
          @if(session('success'))
          <br>
          <div class="alert alert-success anim-left">
            {{ session('success') }}
          </div>
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 p-0">
        <iframe src="https://www.google.com/maps/d/embed?mid=1IEP1pDTwKtUda_zQ7KtH2T7qAMzb9S8&ehbc=2E312F&noprof=1" height="580" style="max-width: 640px;width:100%;"></iframe>
      </div>
    </div>
  </div>

</section>

@endsection