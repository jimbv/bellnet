@extends('layouts.template')
@section('header')

@endsection
@section('scripts')
<script src="/js/animations.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection
@section('styles')
<link href="/css/animations.css?v=2" rel="stylesheet">
<style>
    .portada {
        text-align: center;
        position: absolute;
        width: 100%;
        height: 800px;
        top: 0px;
        left: 0px;
        overflow: hidden;
        z-index: 1;
    }

    .fondo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/imgs/fabrica.jpg');
        background-size: cover;
        background-position: center;
        opacity: 0.9;
    }

    .degradado2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 800px;
        background: linear-gradient(to bottom, rgba(81, 85, 99, 0), rgba(81, 85, 99, 255));
    }
</style>

@endsection
@section('content')

<section>
<div class="portada">
        <div class="fondo">
        </div>
        <div class="degradado2"></div>
    </div>

    <div style="background-color: rgb(81,85,99);" class="empresa">

   
        <p></p>&nbsp;
        <p></p>&nbsp;
        <p></p>&nbsp;
        <br>
        <div class="container" style="z-index:2;position:relative;">
            <div class="row">

                <div class="col-md-12 text-center">
                    <img src="/imgs/pie_blanco.png" alt="Nuestra empresa, Enertech" style="max-width: 100%;">
                </div>
                <div class="col-md-3 pt-3" style="font-size: 10px;"> 
                    <img src="/imgs/sucursal.jpg" alt="Fondo empresa" style="width: 100%;"><br>
                    Sucursal Buenos Aires
                </div>
                <div class="col-md-9 about-text mb-5">
                    <div class="text-center">
                    </div> <br>
                    <p>

                        Nuestra fábrica de iluminación se destaca por su constante enfoque en la innovación y diseño vanguardista de luminarias.
                    </p>
                    <h2 class="roboto">Innovaciones</h2>
                    <p>
                    <ul>
                        <li><strong>DISEÑO ERGONOMICO</strong><br>Nuestras luminarias no solo ofrecen iluminación eficiente, sino que también integran un diseño ergonómico que se adapta perfectamente a entornos modernos. <br></li>
                        <li><strong>EFICIENCIA ENERGÉTICA</strong><br>Incorporamos tecnologías LED de última generación para garantizar una iluminación óptima con un consumo energético mínimo. <br></li>
                        <li><strong>PERSONALIZACIÓN</strong><br>Ofrecemos soluciones personalizadas, permitiendo a nuestros clientes elegir entre una variedad de estilos, colores y configuraciones. <br></li>
                    </ul>
                    </p>
                    <p>
                    <h2>Tecnologías en la Fabricación</h2>
                    <ul>
                        <li><strong>IMPRESIÓN 3D</strong><br>Implementamos tecnologías de impresión 3D para la creación de componentes, permitiendo una producción más eficiente y flexible. <br></li>
                        <li><strong>AUTOMATIZACIÓN ROBÓTICA</strong><br>Utilizamos robots en ciertos procesos de ensamblaje, mejorando la precisión y reduciendo el tiempo de producción. <br></li>
                        <li><strong>MATERIALES SOSTENIBLES</strong><br>Adoptamos materiales respetuosos con el medio ambiente, priorizando la sostenibilidad en toda la cadena de producción. <br></li>
                    </ul>
                    </p>

                    <h2>Desarrollo e implementación</h2>
                    <p>
                    <ul>
                        <li><strong>INTEGRACIÓN IOT</strong><br>Nuestro productos poseen la integración de Internet de las cosas (IoT) en nuestras luminarias, permitiendo el control remoto y la personalización a través de dispositivos inteligentes. <br></li>
                    </ul>
                    </p>
                    <p>

                        Nuestro compromiso con la vanguardia tecnológica y la sostenibilidad impulsa nuestro continuo desarrollo en el campo de la iluminación, garantizando soluciones que no solo iluminan, sino que también transforman espacios.
                    </p>
                    <br>
                </div>
            </div>
            
        </div>
    </div>
</section>
    @endsection