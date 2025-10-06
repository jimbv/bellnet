@extends('layouts.plantilla')
@section('contenido')
<section class="bg-white">
    <div class="max-w-screen-xl mx-auto px-5 py-10">
        <h2 class="text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">
            {{$page->title}}
        </h2>
        <div class="row">
            <div class="col-md-6">
                @if($page->image!='')
                <img src="/{{$page->image}}" alt="{{$page->name}}" style="width:100%; border-radius:8px; box-shadow:0px 0px 8px #f74e04;">
                @else
                <img src="https://via.placeholder.com/600x400?text=Sin+Imagen" alt="{{$page->name}}" style="width:100%; border-radius:8px; box-shadow:0px 0px 8px #f74e04;">
                @endif
            </div>
            <div class="col-md-6">
                <p style="text-align: justify;">{!! $page->description !!}</p>
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