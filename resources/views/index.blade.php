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

    <p></p>

    @foreach($categories as $cat)

    <img src="/{{ $cat->image }}" alt="{{$cat->name}}">
    {{$cat->name}}

    @endforeach

    <br>
  </div>
</section>

<!-- Contact form -->
<section>
  <div class="contact">
    <h1>CONTACTO</h1>
    <p></p>
    FORMULARIO
  </div>
</section>

@endsection