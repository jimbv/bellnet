@extends('plantilla.web') 
@section('cabecera')
  <title>Bellnet | {{$noticia->titulo}}  </title>
  <meta name="description" content="Bellnet es una empresa que se dedica al desarrollo sistemas basados en web."/>

  <meta property="og:title" content="Bellnet | {{$noticia->titulo}}" /> 
  <meta property="og:image" content="http://www.bellnet.com.ar/fuentes/facebook.png" />      
  <meta property="og:url" content="http://www.bellnet.com.ar" />   
 
  <meta property="og:description" content="{!!$noticia->texto_corto!!}" />
    
    @if ($noticia->images->count()>0) 
        <meta property="og:image" content="http://www.bellnet.com.ar/{{$noticia->images->random()->url}}" style='min-width:100%;' />
    @endif
      
  <meta property="og:url" content="http://www.bellnet.com.ar/noticia/{{$noticia->slug}}" />

  <style>
  .breadcrumb-item a{
    color:#eb5d1e;
    font-size:15px;
  }
    
  </style>

@endsection
@section('contenido')
  <main id="main">



<!-- ======= Breadcrumbs ======= -->

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/noticias">Noticias</a></li>
        <li class="breadcrumb-item active"> {{$noticia->titulo}} </li>
      </ol>
  </nav>
  
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container">

    <div class="row">

      <div class="col-lg-4"> 
        @if ($noticia->images->count()>0) 
          <div class="entry-img" style='max-height: 100%;margin: 0px 0px;vertical-align:middle;'>
            <img src="{{$noticia->images->random()->url}}"  alt="" class="img-fluid">
          </div>
          <br>
        @endif
      </div>
      <div class="col-lg-8">       

          <h2>
           {{$noticia->titulo}} 
          </h2>
          <div class="container" style='color:#333;font-size:14px;border-top:1px solid orange;padding-top:6px;'>
            <div class="row">
              <div class="col-md-12 text-right">
                <i class='bx bx-calendar'></i>  {{date('d/m/Y',strtotime($noticia->fecha))}} </li>
              </div> 
            </div>
          </div>
          
          <p></p> 
          <p>
          {!!$noticia->texto_corto!!}
          </p> 
          <p>
          {!!$noticia->texto!!}
          </p> 
          </div>
 
 

      </div><!-- End blog entries list -->
 
 

    </div>

  </div>
</section> 

</main> 

@endsection