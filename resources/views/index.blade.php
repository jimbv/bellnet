@extends('layouts.plantilla')
@section('contenido')
<section class="position-relative w-100" style="height: 50vh; border-bottom: 10px solid #f74e04; overflow:hidden;">

    <!-- Video de fondo -->
    <video autoplay muted loop playsinline preload="metadata"
        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
        poster="/static/images/anfi.bafe026b9054.png"
        style="z-index:0;">
        <source src="/videos/clickweb.webm" type="video/webm">
        <source src="/videos/click.mp4" type="video/mp4">
    </video>

    <!-- Overlay negro -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="background: rgba(0,0,0,0.6); z-index:1;">
    </div>

    <!-- Cuadro de texto centrado verticalmente -->
    <div class="position-absolute top-50 start-50 translate-middle" style="z-index:2; width:90%; max-width:600px;">
        <div style="background: rgba(0,0,0,0); color: white; padding: 0.5rem 1rem; 
                text-align:center; box-shadow: none;">
            <h1 class="h1 fw-bold mb-0" style="font-family: Cloudsters; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);position:relative;top:-15px;">
                Tu marca en todas partes <br>y a otro nivel
            </h1>
        </div>
    </div>




</section>
<section style="background: linear-gradient(to bottom, #d3d3d3, #ffffff);">
    <div class="container py-3" style="position: relative; top: -70px;z-index:9;background:#f74e05;color:white;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-11 text-center" style="font-size:18px;font-weight:bold;letter: spacing 1px;">
                Ayudamos a potenciar marcas, posicionándolas a través de distintos espacios de comunicación, publicidad y difusión. 
                Producimos campañas efectivas a través de un amplio abanico de medios y formatos, que nos permiten llevar estratégicamente marcas a todas partes y a otro nivel.
                </p>
            </div>
        </div>
</section>
<section id="productos" class="bg-white">
    <div class="max-w-screen-xl mx-auto px-5 py-10">
        <h2 class="text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">Nuestros Productos</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 place-items-center">

            @foreach($categories as $category)
            <a href="/categorias/{{$category->slug}}/"
                style="background-color: {{$category->color}}!important; text-decoration:none;"
                class="bg-tertiary-2 rounded-xl p-5 flex xl:flex-col justify-start xl:justify-center items-center hover:scale-[1.02] focus:outline-none focus:ring-4 focus:transform-none transition-all w-full xl:w-48 xl:h-48 relative">
                @if($category->image)
                <img src="{{$category->image}}" alt="Ícono" class="h-16 xl:h-18 w-auto pr-[15px] xl:pr-0 border-r-2 border-r-white xl:border-none xl:mb-2">
                @endif
                <div class="flex flex-col ml-5 xl:ml-0" style="text-decoration:none;">
                    <span class="text-white font-semibold xl:text-center"
                        style="font-size:18px;text-decoration:none;font-family:Cloudsters;">
                        {{strtoupper($category->name)}}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<section id="servicios" class="bg-[#f9f9f9] mb-5 pt-5" style="border-top: 10px solid #e5e7eb;">
    <div class="max-w-screen-xl mx-auto px-5 py-16 text-center">
        <h2 class="text-2xl md:text-3xl font-black uppercase mb-12"
            style="color:#f74e04; font-family:Logomark;">
            Nuestros Servicios
        </h2>

        <div class="flex flex-wrap justify-center gap-6">
            @foreach($services as $service)
                <a href="/servicio/{{$service->slug}}/"
                   class="rounded-xl px-8 py-4 flex items-center justify-center text-center
                          transition-all duration-300 transform hover:scale-[1.05] servicio-btn"
                   style="
                       padding: 10px 20px;
                       background-color: white;
                       color: #f74e04;
                       text-decoration: none;
                       font-family: Cloudsters;
                       font-weight: 600;
                       border: 1px solid #f74e04;
                       min-width: 200px;
                       margin: 10px;
                   ">
                    {{ strtoupper($service->name) }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<style>
/* Efecto hover: fondo naranja y texto blanco */
.servicio-btn:hover {
    background-color: #f74e04 !important;
    color: white !important;
}
</style>




<section class="mb-5 bg-gray-200 p-5 text-center">
    <div id="postsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="text-center carousel-inner">
            <p></p>
            <h2 class="pt-2 text-2xl md:text-3xl font-black text-primary uppercase text-center mb-1" style="color:#111!important;font-family:Logomark;">
                Eventos y espacios para tu marca</h2>
            <p class="text-muted" style="font-family:Cloudsters;">̉¡Quiero sumarme!</p> <br>
            @foreach($posts->chunk(3) as $chunk)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="row g-4 justify-content-center">

                    @foreach($chunk as $post)
                    <div class="col-md-4">
                        <a href="/novedad/{{$post->slug}}" style="text-decoration:none; color:black;">
                            <div class="card h-100 shadow-sm border-0 cardpost">

                                {{-- Imagen destacada (primera del post) --}}
                                @if($post->images->isNotEmpty())
                                <img src="{{ asset($post->images->first()->image_path) }}"
                                    class="card-img-top no-autolink"
                                    alt="{{ $post->images->first()->alt_text ?? $post->title }}">
                                @else
                                <img src="https://via.placeholder.com/600x400?text=Sin+Imagen"
                                    class="card-img-top"
                                    alt="{{ $post->title }}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 800;">{{ $post->title }}</h5>
                                    <p class="card-text">{!! Str::limit($post->short_text, 100) !!}</p>
                                    <a href="{{ url('/novedad/'.$post->slug) }}" class="btn btn-primary btn-sm">
                                        Leer más
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach

            <style>
                .cardpost {
                    transition: all 0.3s ease;
                    cursor: pointer;
                }

                .cardpost:hover {
                    transform: translateY(-10px) scale(1.02);
                    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
                }
            </style>



        </div>

        {{-- Controles del carrusel --}}
        @if($posts->count() > 3)
        <button class="carousel-control-prev" type="button" data-bs-target="#postsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#postsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        @endif
    </div>

    <a href="/novedades" class="btn btn-secondary mt-5">
        <i class="fa fa-plus me-2"></i> Ver todos
    </a>


</section>
<section class="py-5" style="background: linear-gradient(to bottom, #ffffff, #ffbe80);">
    <div class="container">
        <h2 class="text-center text-uppercase fw-bold mb-5" style="color:#111!important;font-family:Logomark;">
            Trabajos Realizados
        </h2>

        @if($work_images->count() > 0)
        <div id="carouselTrabajos" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach($work_images as $index => $work)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="row justify-content-center align-items-center g-4">

                        <!-- Imagen -->
                        <div class="col-md-5 text-center">
                            <img src="/{{ $work->image }}"
                                class="img-fluid rounded-4 shadow"
                                alt="{{ $work->title }}"
                                style="max-height: 300px; object-fit: cover; margin: 0 auto;">
                        </div>

                        <!-- Texto -->
                        <div class="col-md-6">
                            <h4 class="fw-bold mt-3 mt-md-0">{{ $work->title }}</h4>
                            <p class="text-muted">{{ $work->text }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Controles -->
            @if($work_images->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTrabajos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon  rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTrabajos" data-bs-slide="next">
                <span class="carousel-control-next-icon rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
            @endif

            <!-- Indicadores -->
            @if($work_images->count() > 1)
            <div class="carousel-indicators mt-4">
                @foreach($work_images as $index => $work)
                <button type="button"
                    data-bs-target="#carouselTrabajos"
                    data-bs-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}"
                    aria-label="Trabajo {{ $index + 1 }}"></button>
                @endforeach
            </div>
            @endif
        </div>
        @else
        <p class="text-center text-muted">Aún no hay trabajos cargados.</p>
        @endif
    </div>
</section>

<style>
    /* Centrar mejor la imagen y separar flechas */
    #carouselTrabajos .carousel-item img {
        display: block;
        max-width: 100%;
        height: auto;
    }

    /* Mueve las flechas hacia afuera del contenedor */
    #carouselTrabajos .carousel-control-prev,
    #carouselTrabajos .carousel-control-next {
        width: auto;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    /* Indicadores más visibles */
    #carouselTrabajos .carousel-indicators [data-bs-target] {
        background-color: #f74e04;
    }
</style>


<section class="py-5 ">
    <div class="container">
        <div class="text-center mb-5">
            <p></p>
            <h2 class="pt-3 text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">
                Clientes que confían en nosotros</h2>
        </div>

         <div class="container py-4 text-center">
    <div class="row justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
        @foreach($testimonials as $testimonial)
        <div class="col d-flex justify-content-center">
            <div class="card border-0">
                <img src="{{ $testimonial->image ?? 'https://via.placeholder.com/200x200' }}"
                     alt="{{ $testimonial->client }}"
                     class="testimonial-img">
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .testimonial-img {
        width: 180px;               /* ancho fijo para que queden alineadas */
        height: 180px;              /* mismo alto */
        object-fit: cover;          /* recorta sin deformar */
        border-radius: 0 !important;/* sin bordes redondeados */
        transition: transform .3s ease;
    }

    .testimonial-img:hover {
        transform: scale(1.05);     /* efecto leve de zoom */
    }
</style>

</section>

@endsection


<div class="social-fixed d-flex flex-column">
    <a href="https://wa.me/5493535626287?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" target="_blank" class="btn btn-success mb-2">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://www.instagram.com/clickcomunicacion.vm" target="_blank" class="btn btn-light mb-2" style="background-color:#E1306C; color:white;border-color:#E1306C;">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="mailto:info@clickcomunicacion.com.ar" target="_blank" class="  mb-2 btn btn-primary">
        <i class="fa-solid fa-envelope"></i>
    </a>
    <a href="/contacto" class="btn btn-light">
        <i class="fa-solid fa-map-marker-alt"></i>
    </a>
</div>

<style>
    .social-fixed {
        position: fixed;
        right: 20px;
        top: 40%;
        z-index: 9999;
    }

    .social-fixed a {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
</style>