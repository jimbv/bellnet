@extends('layouts.template')
@section('header')

@endsection
@section('content')


<!-- ANIMACIONES -->
<script>
  // esta funcion comprueba si un elemento esta visible en pantalla
  function isVisible(elm) {
    var rect = elm.getBoundingClientRect();
    var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
    return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
  }

  // cuando se carga la página...
  window.addEventListener('DOMContentLoaded', (ev0) => {
    // asignamos un evento scroll...
    window.addEventListener('scroll', (ev1) => {
      // y a todos los elementos con la clase paused...
      document.querySelectorAll(".paused").forEach(elm => {
        if (isVisible(elm)) // que sean visibles...
          elm.classList.remove("paused"); // les quitamos la clase paused
      })
    });
  });
</script>
<style>
  /* primero un poco de CSS muy básico */

  body {
    font-family: sans-serif;
    overflow-x: hidden;
    /* para que nada sobresalga en horizontal */
  }

  .wrapper {
    max-width: 1000px;
    margin: 0 auto;
    padding: 32px;
  }

  /* a partir de aqui el CSS de las animaciones */

  @keyframes anim-fade-in {
    from {
      opacity: 0;
    }

    to {
      opacity: 1
    }
  }

  @keyframes anim-up {
    from {
      opacity: 0;
      transform: translateY(100px);
    }

    to {
      opacity: 1;
      transform: translateY(0px);
    }
  }

  @keyframes anim-down {
    from {
      opacity: 0;
      transform: translateY(-100px);
    }

    to {
      opacity: 1;
      transform: translateY(0px);
    }
  }

  @keyframes anim-left {
    from {
      opacity: 0;
      transform: translateX(100px);
    }

    to {
      opacity: 1;
      transform: translateX(0px);
    }
  }

  @keyframes anim-right {
    from {
      opacity: 0;
      transform: translateX(-100px);
    }

    to {
      opacity: 1;
      transform: translateX(0px);
    }
  }

  .anim-up,
  .anim-down,
  .anim-left,
  .anim-right,
  .anim-fade-in {
    animation-duration: 1s;
    /* la animacion dura X segundos */
    animation-delay: 0.5s;
    /* esperamos X segundos antes de hacer la animacion */
    animation-fill-mode: both;
    /* aplica estilos de la animacion antes y despues de reproducirla */
  }

  .anim-up {
    animation-name: anim-up;
  }

  .anim-down {
    animation-name: anim-down;
  }

  .anim-left {
    animation-name: anim-left;
  }

  .anim-right {
    animation-name: anim-right;
  }

  .anim-fade-in {
    animation-name: anim-fade-in;
  }

  .anim-pause-0 {
    animation-delay: 0s;
  }

  /* la animacion empieza en 2 seg. */
  .anim-pause-1 {
    animation-delay: 0.5s;
  }

  /* la animacion empieza en 2 seg. */
  .anim-pause-2 {
    animation-delay: 1s;
  }

  /* la animacion empieza en 2 seg. */
  .anim-pause-3 {
    animation-delay: 1.5s;
  }

  /* la animacion empieza en 3 seg. */
  .anim-pause-4 {
    animation-delay: 2s;
  }

  /* la animacion empieza en 4 seg. */
  .anim-pause-5 {
    animation-delay: 2.5s;
  }

  /* la animacion empieza en 5 seg. */

  /* todas las animaciones pausadas */
  .paused * {
    animation-play-state: paused;
  }
</style>
<!-- FIN DE LAS ANIMACIONES -->


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

<!-- Carrousel casos de exito -->
<section>
  <!-- <div style='height:900px;padding:10px;'></div>
  <img src="/imgs/slider/infinito.png" alt="slider" style="position: absolute;z-index:-10; top:0px;left:0xp; width:100%;" />
-->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('/imgs/slider/infinito.png')">
        <div class="carousel-caption">
          <h5>Lámpara de pié infinito</h5>
          <p>Diseño para tus espacios</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('/imgs/slider/colgante.png')">
        <div class="carousel-caption">
          <h5>Colgante</h5>
          <p>Da un toque especial a tus lugares.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</section>
<!-- Mozaico productos destacados -->
<section>
  <div class="products">
    <h1>NUESTROS PRODUCTOS</h1>

    <style>
      #galeria {
        margin: 1rem auto;
        width: 100%;
        max-width: 1600px;
        column-count: 5;

      }

      @media (max-width: 1140px) {
        #galeria {
          columns: 3;
        }

      }

      /* Móviles en horizontal o tablets en vertical */

      @media (max-width: 920px) {
        #galeria {
          columns: 2;
        }

      }

      /* Móviles en vertical */

      @media (max-width: 680px) {
        #galeria {
          columns: 1;
        }
      }

      .itemCategoria {
        width: 100%;
        height: 100%;
        position: relative;
        padding: 4px;
      }

      .itemCategoria .image {
        width: 100%;
        height: 100%;
        overflow: hidden;
      }

      .itemCategoria .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 50%;
        cursor: pointer;
        transition: .5s ease-in-out;
      }

      .itemCategoria:hover .image img {
        transform: scale(1.03);
      }

      .img-overlay {
        align-items: center;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        height: 100%;
        justify-content: center;
        left: 0;
        position: absolute;
        opacity: 0;
        top: 0;
        transition: opacity 0.50s;
        width: 100%;
      }

      .img-overlay:hover {
        opacity: 1;
      }

      .tituloCategoria {
        color: rgb(238, 238, 238);
        font-weight: 600;
        font-size: 40px;
        text-align: center;
        text-decoration: none;
      }
    </style>
    <div id="galeria" class="paused">
      @foreach($categories as $cat)
      <a class="tituloCategoria anim-fade-in anim-pause-{{rand(0, 5)}}" href="../shop/espejos.html">
        <div class="itemCategoria">
          <div class="image">
            <img src="/{{ $cat->image }}" alt="{{$cat->name}}" style='max-width:300px;'>
          </div>
          <div class="img-overlay">{{$cat->name}}</div>
        </div>
      </a>
      @endforeach
    </div>

    <br>

    <div id="contacto" class="paused">
      <div class="container text-center anim-up" style="font-size: 16px;color:white;">
        <a href="/productos" style="text-decoration:none;">
          <div style="color:white;border: 1px solid gray;  border-radius: 3px 0 0 3px; width:40px; display:inline-block;">
            <i class="fa fa-plus" aria-hidden="true"></i>
          </div>
          <div style="color:white;border: 1px solid gray; border-radius: 0 3px 3px 0;  width:150px; display:inline-block;">
            Ver más productos
          </div>
      </div>
      <br>
      </a><br>
    </div>
</section>

<!-- Contact form -->
<section style="background: radial-gradient(circle at 10% 20%, rgb(90, 92, 106) 0%, rgb(32, 45, 58) 81.3%);" class="paused">
  <div class="container contacto p-3">
    <br>
    <p></p>
    <div class="row">
      <div class="col-4 p-0">
        <iframe src="https://www.google.com/maps/d/embed?mid=1IEP1pDTwKtUda_zQ7KtH2T7qAMzb9S8&ehbc=2E312F&noprof=1" height="480" style="max-width: 640px;width:100%;"></iframe>
      </div>
      <div class="col-8">
        <div class="anim-left" style="background: linear-gradient(180.2deg, rgb(30, 33, 48) 6.8%, rgb(74, 98, 110) 131%);margin-left:10px;margin-right:10px;color:white;padding:20px;height:100%;">
          <h1>CONTACTO</h1>
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
            <button type="submit" class="btn btn-dark  anim-pause-5 anim-left">Enviar mensaje</button>
          </form>
          @if(session('success'))
          <br>
          <div class="alert alert-success anim-left">
            {{ session('success') }}
          </div>
          @endif
        </div>
      </div>
    </div>

    <p></p> <br>
  </div>

</section>

@endsection