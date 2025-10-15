@extends('layouts.plantilla')
@section('contenido')
<section class="py-5 bg-light">
    <div class="container">
        <div class="mb-4">
            <a href="{{ url('/novedades') }}" class="text-decoration-none text-primary">
                ← Volver a Novedades
            </a>
        </div>

        <div class="card border-0 shadow-lg p-4">
            {{-- Carrusel de imágenes --}}
            @if($post->images->isNotEmpty())
                <div id="postCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4 shadow-sm" style="max-height: 350px; overflow:hidden;">
                        @foreach($post->images as $key => $image)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <img src="{{ asset($image->image_path) }}"
                                     class="d-block w-100 object-fit-cover"
                                     alt="{{ $image->alt_text ?? $post->title }}"
                                     style="height: 350px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>

                    @if($post->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    @endif
                </div>
            @endif

            <h1 class="fw-bold mb-3" style="color:#111;font-family:Logomark;">
                {{ $post->title }}
            </h1>

            <div class="text-muted mb-4">
                Publicado el {{ $post->created_at->format('d/m/Y') }}
            </div>

            <div class="fs-5" style="line-height: 1.7;">
                {!! $post->text !!}
            </div>
        </div>
    </div>
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