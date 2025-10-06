@extends('layouts.plantilla')
@section('contenido')
<section class="bg-white" style="background-color: white;">
    <div class="container my-5">

        <!-- Encabezado -->
        <div class="text-center mb-4">
            <h2 class="text-center text-uppercase fw-bold mb-5 display-5"
                style="color: black !important; font-family: Cloudsters;">
                {{ $product->name }}
            </h2>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item">Categorías</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->category->name }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">

            <aside class="col-md-3 mb-4">
                <div class="list-group shadow-sm">
                    @foreach($categories as $cat)
                    @php
                    $isActive = $cat->id == $product->category_id;
                    @endphp
                    <a
                        href="{{ route('productos.categoria', $cat->slug) }}"
                        class="list-group-item list-group-item-action categoria-item {{ $isActive ? 'active' : '' }}"
                        style="
          --cat-color: {{ $cat->color ?? '#0d6efd' }};
          {{ $isActive ? 'background-color: ' . $cat->color . ';border-color: ' . $cat->color . '; color: #fff; font-weight: 600;text-shadow:0px 0px 1px black;' : '' }}
        ">
                        {{ $cat->name }}
                    </a>
                    @endforeach
                </div>
            </aside>
            <style>
                .categoria-item {
                    transition: all 0.2s ease;
                }

                /* Efecto hover con el color de la categoría */
                .categoria-item:hover {
                    background-color: var(--cat-color);
                    color: #fff !important;
                    font-weight: 600;
                }

                /* Asegura contraste de texto en hover */
                .categoria-item:hover,
                .categoria-item.active {
                    text-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
                }
            </style>
            <!-- Principal: Productos -->
            <section class="col-md-9">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <p class="card-text small text-muted">{!! $product->description !!}</p>
                        @if($product->price)
                        <p class="fw-bold text-success mb-0">${{ number_format($product->price, 2, ',', '.') }}</p>
                        @endif
                    </div> 
                </div>
            </section>
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