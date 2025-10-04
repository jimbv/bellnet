@extends('layouts.plantilla')
@section('contenido')
<section class="position-relative w-100" style="height: 50vh; border-bottom: 10px solid #f74e04; overflow:hidden;">

    <!-- Video de fondo -->
    <video autoplay muted loop playsinline preload="none"
        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
        poster="/static/images/anfi.bafe026b9054.png"
        style="z-index:0;">
        <source src="/videos/video.mp4" type="video/mp4">
        <source src="/videos/video.webm" type="video/webm">
    </video>

    <!-- Overlay negro -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="background: rgba(0,0,0,0.6); z-index:1;">
    </div>

    <!-- Cuadro de texto centrado verticalmente -->
    <div class="position-absolute top-50 start-50 translate-middle" style="z-index:2; width:90%; max-width:600px;">
        <div style="background: rgba(0,0,0,0.6); color: white; padding: 0.5rem 1rem; 
                text-align:center; box-shadow: none;">
            <h1 class="h1 fw-bold mb-0" style="font-family: Cloudsters; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                Tu marca en todas partes <br>y a otro nivel
            </h1>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="max-w-screen-xl mx-auto px-5 py-10">
        <h2 class="text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">Nuestros Productos</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 place-items-center">

            @foreach($categories as $category)
            <a href="/category/{{$category->id}}" target="_blank"
                style="background-color: {{$category->color}}!important; text-decoration:none;"
                class="bg-tertiary-2 rounded-xl p-5 flex xl:flex-col justify-start xl:justify-center items-center hover:scale-[1.02] focus:outline-none focus:ring-4 focus:transform-none transition-all w-full xl:w-48 xl:h-48 relative">
                @if($category->image)
                <img src="{{$category->image}}" alt="Ícono" class="h-16 xl:h-18 w-auto pr-[15px] xl:pr-0 border-r-2 border-r-white xl:border-none xl:mb-2">
                @endif
                <div class="flex flex-col ml-5 xl:ml-0" style="text-decoration:none;">
                    <span class="text-white font-semibold xl:text-center"
                        style="font-size:18px;text-decoration:none;font-family:Logomark;">
                        {{strtoupper($category->name)}}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<section class="mb-5">
    <div id="postsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <p></p>
            <h2 class="pt-3 text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#111!important;font-family:Logomark;">
                NOVEDADES</h2>

            @foreach($posts->chunk(3) as $chunk)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="row g-4 justify-content-center">

                    @foreach($chunk as $post)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">

                            {{-- Imagen destacada (primera del post) --}}
                            @if($post->images->isNotEmpty())
                            <img src="{{ asset($post->images->first()->image_path) }}"
                                class="card-img-top"
                                alt="{{ $post->images->first()->alt_text ?? $post->title }}">
                            @else
                            <img src="https://via.placeholder.com/600x400?text=Sin+Imagen"
                                class="card-img-top"
                                alt="{{ $post->title }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{!! Str::limit($post->short_text, 100) !!}</p>
                                <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-primary btn-sm">
                                    Leer más
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach

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

</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <p></p>
            <h2 class="pt-3 text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">Nuestros clientes</h2>
            <p class="text-muted">Experiencias reales de quienes confiaron en nosotros</p>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach($testimonials->chunk(3) as $chunkIndex => $chunk)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="row g-4 justify-content-center">
                                @foreach($chunk as $testimonial)
                                <div class="col-md-4 @if($loop->index > 0) d-none d-md-block @endif @if($loop->index > 1) d-none d-lg-block @endif">
                                    <div class="card h-100 shadow-sm border-0 position-relative">
                                        <div class="card-body text-center">
                                            <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                            <p class="card-text fst-italic mt-4">
                                                “{{ $testimonial->review }}”
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white border-0 text-center">
                                            <img src="{{ $testimonial->image ?? 'https://via.placeholder.com/60' }}"
                                                class="testimonial-img rounded-circle mx-auto d-block mb-2"
                                                alt="{{ $testimonial->client }}">
                                            <h6 class="fw-bold mb-0">{{ $testimonial->client }}</h6>
                                            <small class="text-muted">{{ $testimonial->role ?? '' }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Controles -->
                    @if($testimonials->count() > 3)
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    @endif
                </div>

                <style>
                    .testimonial-img {
                        width: 60px;
                        /* tamaño fijo */
                        height: 60px;
                        /* cuadrado */
                        object-fit: cover;
                        /* recorta si la foto no es cuadrada */
                    }
                </style>
            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

@endsection


<div class="social-fixed d-flex flex-column">
    <a href="https://wa.me/5493534066579?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" target="_blank" class="btn btn-success mb-2">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://www.instagram.com/clickcomunicacion.vm" target="_blank" class="btn btn-light mb-2" style="background-color:#E1306C; color:white;border-color:#E1306C;">
        <i class="fa-brands fa-instagram"></i>
    </a>
    <a href="mailto:info@clickcomunicacion.com.ar" target="_blank" class="  mb-2 btn btn-primary">
        <i class="fa-solid fa-envelope"></i>
    </a>
    <a href="/contacto" target="_blank" class="btn btn-light">
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