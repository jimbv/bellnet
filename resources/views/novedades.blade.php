@extends('layouts.plantilla')
@section('contenido')
<section class="bg-white py-5">
    <div class="container">
        <h2 class="text-center fw-bold text-uppercase mb-5" style="color:#111;font-family:Logomark;">
            Novedades
        </h2>

        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden news-card">
                        {{-- Imagen destacada --}}
                        @if($post->images->isNotEmpty())
                            <img src="{{ asset($post->images->first()->image_path) }}"
                                class="card-img-top img-fluid"
                                alt="{{ $post->images->first()->alt_text ?? $post->title }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Sin+Imagen"
                                class="card-img-top img-fluid"
                                alt="{{ $post->title }}">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-muted mb-3">
                                {!! Str::limit($post->short_text, 100) !!}
                            </p>
                            <a href="{{ url('/novedad/'.$post->slug) }}" class="btn btn-outline-primary mt-auto">
                                Leer más →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .news-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 12px;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-title {
        font-size: 1.1rem;
        color: #111;
    }
    .card-text {
        font-size: 0.95rem;
    }
    .btn-outline-primary {
        border-radius: 50px;
        font-weight: 500;
    }
</style>
<div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
</div>

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