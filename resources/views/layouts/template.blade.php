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

    <link href="/css/style.css?v=11" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> <img src="/imgs/enertech.png" alt="Enertech"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: white;font-size:22px;box-shadow:1px solid black;"></i>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="#">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">PRODUCTOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EMPRESA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">NOTICIAS</a></li>
                            <li><a class="dropdown-item" href="#">GLOSARIO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">CONTACTO</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.instagram.com/enertech.iluminacionled/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.facebook.com/enertechiluminacionled/"><i class="fab fa-facebook"></i></a>
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
                    <div class="col-md-6">
                        <img src="imgs/pie.png" alt="Enertech - Ilumninación">
                    </div>
                    <div class="col-md-6 p-4">
                        <strong> CONTACTO</strong> <p>Hola</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright" style="color:white;">
            &copy; enertech <?= date('Y') ?>
        </div>
    </footer>

</body>

</html>