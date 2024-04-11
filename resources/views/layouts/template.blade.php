<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ener-tech</title>
    <link rel="icon" type="image/x-icon" href="/imgs/logo.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Enertech') }}</title>

    <link href="/css/style.css?v=16" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('scripts')
    @yield('styles')

</head>

<body id="inicio">
    @yield('header')
    <nav class="navbar navbar-expand-lg navbar-light p-3" style="z-index: 10;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> <img src="/imgs/enertech.png" alt="Enertech"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: white;font-size:22px;box-shadow:1px solid black;"></i>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="/#inicio">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/productos">PRODUCTOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EMPRESA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/empresa">ACERCA DE NOSOTROS</a></li>
                            <li><a class="dropdown-item" href="/glosario">GLOSARIO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/#contacto">CONTACTO</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.youtube.com/@enertechingenieria-disenod7088"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.instagram.com/enertechiluminacion/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.facebook.com/enertechiluminacion/"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://wa.me/5493537595618?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios"><i class="fab fa-whatsapp"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 pt-5">

                        <ul class="navbar-nav ms-auto d-none d-lg-inline-flex  pt-2">
                            <li class="nav-item mx-2">
                                <a target="_blank" class="bottomSocial" href="https://www.youtube.com/@enertechingenieria-disenod7088"><i class="fab fa-youtube"></i> enertechingenieria</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a target="_blank" class="bottomSocial" href="https://www.instagram.com/enertechiluminacion/"><i class="fab fa-instagram"></i> enertechiluminacion</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a target="_blank" class="bottomSocial" href="https://www.facebook.com/enertechiluminacion/"><i class="fab fa-facebook"></i> enertechiluminacion</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="/imgs/pie_blanco.png" style="margin: 10px;" alt="Enertech - Ilumninación">
                    </div>
                    <div class="col-md-4 p-4 mt-2 ml-3 text-end pt-5">
                        Ruta 9 KM. 500 - Bell Ville - Córdoba <br>
                        <i class="fa fa-phone"></i> &nbsp;&nbsp;
                        (03537) 450176 <br>
                        <a href="https://wa.me/5493537595618?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" style="color:white;text-decoration:none;"><i class="fab fa-whatsapp"></i> &nbsp;&nbsp;
                            +54 9 3537 595618</a> <br>
                        <a href="mailto:enertechventas@gmail.com" style="color:white;text-decoration:none;"><i class="fa fa-envelope"></i> &nbsp;&nbsp;enertechventas@gmail.com</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="copyright" style="color:white; background-image: linear-gradient(to right,#111, #555, #111);">
            &copy; enertech <?= date('Y') ?>
        </div>
    </footer>
    <a href="#">
        <div alt="Comuncarse por WhatsApp" style="background:#07b018;position:fixed;bottom:20px;right:20px;height: 70px;width: 70px;font-size:45px;padding-top:2px;line-height:70px; color:white; overflow:hidden;border-radius:100px;box-shadow: 0px 0px 5px #111;text-align:center;">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>
</body>

</html>