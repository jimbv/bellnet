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
  <div class="products" >
    <h1>NUESTROS PRODUCTOS</h1>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <style>
      .grid-item {
        position: inline-block;
        /*float: left;*/
        width: 400px;
        height: 300px;
        border: 2px solid hsla(0, 0%, 0%, 0.5);
      }

      .grid-item--width2 {
        width: 600px;
      }

      .grid-item--height2 {
        height: 200px;
      }
    </style>
    <div class="grid">

      @foreach($categories as $cat)

      <div class="grid-item">
        <div class="card">
          <text x="50%" y="50%" fill="#dee2e6" dy=".3em">{{$cat->name}}</text>
          <img src="/{{ $cat->image }}" alt="{{$cat->name}}">
        </div>
      </div> 
      @endforeach 

    </div>
  </div>

  <br>
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