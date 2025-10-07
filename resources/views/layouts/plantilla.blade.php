<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Comunicación & Publicidad</title>

    <meta property="og:locale" content="es_AR" />
    <meta property="og:title" content="Click Comunicación y Publicidad, Agencia Villa María, Córdoba, Argentina" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://clickcomunicacion.com.ar/" />
    <meta property="og:description" content="Click Comunicación agencia de publicidad" />


    <link rel="icon" type="image/x-icon" href="/imgs/icono.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MVM" />
    <link rel="manifest" href="/favicon/site.webmanifest" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/style_prueba.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @font-face {
            font-family: "Logomark";
            src: url("/fonts/LOGOMARK.otf") format("opentype"),
                url("/fonts/LOGOMARK.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Cloudsters";
            src: url("/fonts/Cloudsters.otf") format("opentype"),
                font-weight: normal;
            font-style: normal;
        }
    </style>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('scripts')
    @yield('styles')


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="bg-white flex flex-col min-h-screen justify-start">



    <header class="w-full bg-white shadow-md z-10">

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3" style="z-index:10;">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/imgs/logo.png" alt="Click comunicación" style="height:60px;">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars" style="color: black;font-size:22px;"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family:Cloudsters;">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link mx-2" href="/#productos">PRODUCTOS</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">SERVICIOS</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($services as $service)
                                <li><a class="dropdown-item" href="/servicio/{{$service->slug}}">{{$service->name}}</a></li> 
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">EMPRESA</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/page/nuestra-empresa">ACERCA DE NOSOTROS</a></li>
                                <li><a class="dropdown-item" href="/novedades">NOTICIAS</a></li>
                                <li><a class="dropdown-item" href="/page/preguntas-frecuentes">PREGUNTAS FRECUENTES</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link mx-2" href="/contacto">CONTACTO</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-lg-inline-flex">
                        <form action="{{ route('productosbuscar') }}" method="GET" class="mt-3">
                            <div class="input-group">
                                <input type="text"
                                    name="q"
                                    class="form-control rounded-start"
                                    placeholder="Buscar productos"
                                    style="font-family: 'Courier New', Courier, monospace;"
                                    required>
                                <button class="btn btn-primary rounded-end" type="submit" style="background-color: #f74e04; border-color:#f74e04">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>





    <footer class="w-full mt-auto" style="background-color: #111e26;" id="pie">
        <div class="max-w-screen-xl mx-auto px-5">
            <div class="pt-5">
                <div class="flex flex-col sm:flex-row justify-center sm:justify-between items-center mb-10">
                    <img src="/imgs/logoblanco.png" alt="Click comunicación" class="h-14 w-auto mb-5 sm:mb-0">


                    <form action="{{ route('subscribe') }}" method="POST" class="sm:w-50 max-w-md text-white">
                        @csrf
                        <label for="email" class="form-label mb-2">
                            Sumate a nuestra lista y recibí novedades
                        </label>

                        <div class="input-group">
                            <input type="email"
                                id="email"
                                name="email"
                                placeholder="Ingresá tu email"
                                class="form-control rounded-start"
                                required>
                            <button type="submit" class="btn btn-danger rounded-end">
                                Suscribirme
                            </button>
                        </div>

                            <div class="mb-1">
                                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                @error('g-recaptcha-response') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                    </form>



                    <div class="flex justify-end items-center gap-5">
                        <div class="contacto" style=" text-align:left; ">
                            <p style="color:#fff; font-size:18px; margin-bottom:15px;font-family:Cloudsters;">
                                Agencia de Comunicación & Publicidad
                            </p>

                            <p>
                                <a href="https://wa.me/5493534066579?text=Hola,%20acabo%20de%20visitar%20su%20pagina%20web%20y%20queria%20pedir%20mas%20informacion%20sobre%20sus%20productos%20y%20servicios" target="_blank" style="color:#fff; text-decoration:none; margin:0 10px; font-size:16px;">
                                    <i class="fab fa-whatsapp"></i> 353 4066579
                                </a>
                            </p>

                            <p>
                                <a href="https://instagram.com/clickcomunicacionvm" target="_blank" style="color:#fff; text-decoration:none; margin:0 10px; font-size:16px;">
                                    <i class="fab fa-instagram"></i> @clickcomunicacionvm
                                </a>
                            </p>

                            <p>
                                <a href="mailto:info@clickcomunicacion.com.ar" style="color:#fff; text-decoration:none; margin:0 10px; font-size:16px;">
                                    <i class="fas fa-envelope"></i> info@clickcomunicacion.com.ar
                                </a>
                            </p>
                            <p>
                                <a href="https://www.google.com/maps/place/Villa+María,+Córdoba" target="_blank"
                                    style="color:#fff; text-decoration:none; margin:0 10px; font-size:16px;">
                                    <i class="fas fa-map-marker-alt"></i> Villa María, Córdoba
                                </a>
                            </p>

                        </div>

                        <!-- Hover con estilo -->
                        <style>
                            .contacto a:hover {
                                color: #f74e04;
                            }

                            .contacto i {
                                margin-right: 8px;
                            }
                        </style>


                    </div>
                </div>
                <div class=" text-sm flex flex-col sm:flex-row justify-center items-center gap-5 pb-10" style="color: white;">
                    <a href="/institucional" style="color: white;text-decoration: none;">Nuestra empresa</a>
                    <a href="/novedades" style="color: white;text-decoration: none;">Noticias</a>
                    <a href="/contacto" style="color: white;text-decoration: none;">Preguntas frecuentes</a>
                    <a target="_blank" href="https://www.instagram.com/clickcomunicacionvm/" style="color: white;text-decoration: none;">
                        <i class="fab fa-instagram"></i> clickcomunicacionvm
                    </a>
                </div>
                <div class="text-center pb-10 text-xs " style="color: white;text-decoration: none;">
                    © {{ date('Y') }} Click comunicación & publicidad
                </div>

            </div>
        </div>
    </footer>






</body>

</html