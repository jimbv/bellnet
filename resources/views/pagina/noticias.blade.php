@extends('plantilla.web') 
@section('cabecera')
    <title>Bellnet | Desarrollo Web </title>
    <meta name="description" content="Bellnet es una empresa que se dedica al desarrollo sistemas basados en web."/>

    <meta property="og:title" content="Bellnet | Noticias" /> 
    <meta property="og:image" content="http://www.bellnet.com.ar/fuentes/facebook.png" />      
    <meta property="og:url" content="http://www.bellnet.com.ar" />   

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
        <li class="breadcrumb-item">Noticias</li>
        
      </ol>
  </nav>
   



<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">
  
      <div class="row">
      @foreach ($noticias as $noticia)
  
                      
  
  
        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry text-center">
  
              @if ($noticia->images->count()>0) 
  
              <div class="entry-img">
                <a href="noticia/{{$noticia->slug}}" style='color:black;'>  
              <img src="{{$noticia->images->random()->url}}"  alt="" class="img-fluid" style='min-width:100%;' />
              </div> 
                </a>
              @endif
  
            
  
            <h3 style='padding-top:10px;'>
              <a href="noticia/{{$noticia->slug}}" style='color:black; padding-top:5px;'>{{$noticia->titulo}}</a>
            </h2>
            <div style='font-size:11px;'>
            <i class="bx bx-calendar"></i>  {{date('d/m/Y',strtotime($noticia->fecha))}} </li>
        </div>
   
            </div>
  
          </article><!-- End blog entry -->
        </div>
      @endforeach
      </div>
  
      <div style='width:100%;text-align:center;'>
  
        <div style='display:inline-block;'>
          {{ $noticias->appends($_GET)->links()}} 
        </div>
   
      </div>
  
    </div>
  </section><!-- End Blog Section -->
  

</main> 

@endsection