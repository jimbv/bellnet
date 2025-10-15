<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Click Comunicación</title>
    <link rel="icon" type="image/x-icon" href="/imgs/logo.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Click Comunicación') }}</title>

    <link href="/css/style.css?v=19" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('scripts')
    @yield('styles')

</head>

<body id="inicio">
    @yield('header')
    <nav class="navbar navbar-expand-lg navbar-light p-3" style="z-index: 10;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/#inicio"> <img src="/imgs/logo.png" alt="Click comunicación"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color: white;font-size:22px;box-shadow:1px solid black;"></i>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/productos">PRODUCTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/#obras">SERVICIOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EMPRESA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/empresa">ACERCA DE NOSOTROS</a></li>
                            <li><a class="dropdown-item" href="/noticias">NOTICIAS</a></li>
                            <li><a class="dropdown-item" href="/glosario">PREGUNTAS FRECUENTES</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/#contacto">CONTACTO</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                    
                    <li class="nav-item mx-2">
                        <a target="_blank" class="redesMenu" href="https://www.instagram.com/clickcomunicacion.vm/"><i class="fab fa-instagram"></i></a>
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
                                <a target="_blank" class="bottomSocial" href="https://www.instagram.com/clickcomunicacion.vm/"><i class="fab fa-instagram"></i> Instagram</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col-md-4 text-center"> 
                    </div>
                    <div class="col-md-4 text-end pt-5">
                        <strong >Click Comunicación</strong> <br>
                        Bruno Daniel Schiavi <br>
                        <i class="fa fa-phone"></i>  
                        <a href="https://wa.me/5493535626287?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" style="color:white;text-decoration:none;"><i class="fab fa-whatsapp"></i> &nbsp;&nbsp;
                            +54 9 3537 667250</a> <br> 
                        <a href="https://wa.me/5493535626287?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" style="color:white;text-decoration:none;"><i class="fab fa-whatsapp"></i> &nbsp;&nbsp;
                            +54 9 11 6256-3230</a> <br>
                        <a href="mailto:info@clickcomunicacion.com.ar" style="color:white;text-decoration:none;"><i class="fa fa-envelope"></i> &nbsp;&nbsp;info@clickcomunicacion.com.ar</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="copyright" style="color:white; background-image: linear-gradient(to right,#111, #555, #111);">
            &copy; Click Comunicación <?= date('Y') ?>
        </div>
    </footer>
    <a href="https://wa.me/5493535626287?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" style="z-index=5;">
        <div alt="Comunicarse por WhatsApp" style="background:#07b018;position:fixed;bottom:20px;right:20px;height: 70px;width: 70px;font-size:45px;padding-top:2px;line-height:70px; color:white; overflow:hidden;border-radius:100px;box-shadow: 0px 0px 5px #111;text-align:center;">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>
</body>

</html>