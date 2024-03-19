@extends('layouts.template')
@section('header')

@endsection
@section('content')

<!-- Carrousel casos de exito -->
<section>
  <div style='height:900px;padding:10px;'></div>
  <img src="/imgs/slider/infinito.png" alt="slider" style="position: absolute;z-index:-10; top:0px;left:0xp; width:100%;" />
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
    <div id="galeria">
      @foreach($categories as $cat)
      <a class="tituloCategoria" href="../shop/espejos.html">
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
    <div class="container text-center" style="font-size: 16px;color:white;">
      <a href="/productos" style="text-decoration:none;">
        <div style="color:white;border: 1px solid gray;  border-radius: 3px 0 0 3px; width:40px; display:inline-block;">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </div>
        <div style="color:white;border: 1px solid gray; border-radius: 0 3px 3px 0;  width:150px; display:inline-block;">
          Ver más productos
        </div>
    </div>
    <br>
    </a>
</section>

<!-- Contact form -->
<section style="background: radial-gradient(circle at 10% 20%, rgb(90, 92, 106) 0%, rgb(32, 45, 58) 81.3%);">
  <div class="container contacto p-3">
    <br>
    <div class="row">
      <div class="col-4 p-0">
        <iframe src="https://www.google.com/maps/d/embed?mid=1IEP1pDTwKtUda_zQ7KtH2T7qAMzb9S8&ehbc=2E312F&noprof=1" height="480" style="max-width: 640px;width:100%;"></iframe>
      </div>
      <div class="col-8">
        <div style="background: linear-gradient(180.2deg, rgb(30, 33, 48) 6.8%, rgb(74, 98, 110) 131%);margin-left:10px;margin-right:10px;color:white;padding:20px;height:100%;">
          <h1>CONTACTO</h1>
          <hr>

          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" name="name" id="name" class="form-control" required>
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Correo electrónico:</label>
              <input type="email" name="email" id="email" class="form-control" required>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Teléfono / Celular:</label>
              <input type="text" name="phone" id="phone" class="form-control" required>
              @if ($errors->has('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
              @endif
            </div>

            <div class="form-group">
              <label for="message">Mensaje:</label>
              <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
              @if ($errors->has('message'))
              <span class="text-danger">{{ $errors->first('message') }}</span>
              @endif
            </div>
            <div class="form-group"> 
              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
              @if ($errors->has('g-recaptcha-response'))
              <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
              @endif
            </div>
            <br>
            <button type="submit" class="btn btn-dark">Enviar mensaje</button>
          </form>

        </div>
      </div>
    </div>

    <p></p> <br>
  </div>

</section>

@endsection