<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="keywords" content="Desarrollo Web, Sistemas de Información, Bell Ville, Páginas web, paginas web, sitios web, pagina web, pagina bell ville, webpage, webmaster, desarrollador"/>
    
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172049918-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-172049918-1');
  </script>

  <!-- Favicons -->
  <link href="/img/icono.png" rel="icon">
  <link href="/img/icono.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/ninestars/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/ninestars/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/ninestars/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/ninestars/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/ninestars/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/ninestars/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/ninestars/assets/css/style.css" rel="stylesheet">
  
  @yield('cabecera')

</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">

    <div class="container-fluid d-flex">



      <div class="logo mr-auto">

        <h1 class="text-light"><a href="/"><img src="/img/icono.png" style='height:100%;position:relative;top:-4px;'  class="img-fluid"><span>&nbsp;&nbsp;bellnet</span></a></h1>

      </div>



      <nav class="nav-menu d-none d-lg-block">

        <ul>

          <li class="active"><a href="/#header">Inicio</a></li> 

          <li><a href="/#services">Servicios</a></li>

          <li><a href="/#novedades">Novedades</a></li>

          <!--<li class="drop-down"><a href="">Servicios</a>

            <ul>

              <li><a href="#">Drop Down 1</a></li>

              <li class="drop-down"><a href="#">Drop Down 2</a>

                <ul>

                  <li><a href="#">Deep Drop Down 1</a></li>

                  <li><a href="#">Deep Drop Down 2</a></li>

                  <li><a href="#">Deep Drop Down 3</a></li>

                  <li><a href="#">Deep Drop Down 4</a></li>

                  <li><a href="#">Deep Drop Down 5</a></li>

                </ul>

              </li>

              <li><a href="#">Drop Down 3</a></li>

              <li><a href="#">Drop Down 4</a></li>

              <li><a href="#">Drop Down 5</a></li>

            </ul>

          </li>-->

          <li><a href="/#contact">Contactános</a></li>



          <li class="get-started"><a href="/login">Acceso Clientes</a></li>

        </ul>

      </nav><!-- .nav-menu -->

    </div>

  </header><!-- End Header -->


 
 


  <main id="main">
 
    @yield('contenido')
  </main><!-- End #main -->



  <!-- ======= Footer ======= -->

  <footer id="footer"  style='background:#CCC;'> 


    <div class="footer-top">

      <div class="container">

        <div class="row">



          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">

            <h3>bellnet</h3>

            <p>

              Bell Ville (2550) - Córdoba<br>

              Argentina<br><br>

              <strong>Teléfono:</strong> +594 3537 609004<br>

              <strong>Email:</strong> info@bellnet.com.ar<br>

            </p>

          </div>



          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">

            <h4>Menú</h4>

            <ul>

              <li><i class="bx bx-chevron-right"></i> <a href="/#">Inicio</a></li>

              <li><i class="bx bx-chevron-right"></i> <a href="/#services">Servicios</a></li>
              
              <li><i class="bx bx-chevron-right"></i> <a href="/#novedades">Novedades</a></li>

              <li><i class="bx bx-chevron-right"></i> <a href="/#compromiso">Compromiso</a></li>

            </ul>

          </div>



          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">

            <h4>Productos y Servicios</h4>

            <ul>

              <li><i class="bx bx-chevron-right"></i> <a href="/#services">Turneros digitales</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#services">Desarrollo de sistemas</a></li>

            </ul>

          </div>



          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">

            <h4>Nuestras redes sociales</h4>

            <p>Encontranos también en estos medios</p>

            <div class="social-links mt-3">

              <a href="http://twitter.com/bellnetweb" class="twitter"><i class="bx bxl-twitter"></i></a>

              <a href="http://facebook.com/bellnetweb" class="facebook"><i class="bx bxl-facebook"></i></a>

              <a href="https://www.instagram.com/bellnetweb/" class="instagram"><i class="bx bxl-instagram"></i></a> 

              <a href="https://wa.me/5493537609004" class="linkedin"><i class="bx bxl-whatsapp"></i></a>

            </div>

          </div>

        </div>

      </div>

    </div>



    <div class="container py-4">

      <div class="copyright">
         <strong><span><img src="/img/bellnet_icon.png" alt="Bellnet" style='width:25px;'></span></strong> 

      </div>
      <div class="credits">

      </div>

    </div>

  </footer><!-- End Footer -->



  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



  <!-- Vendor JS Files -->

  <script src="/ninestars/assets/vendor/jquery/jquery.min.js"></script>

  <script src="/ninestars/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="/ninestars/assets/vendor/jquery.easing/jquery.easing.min.js"></script>

  <script src="/ninestars/assets/vendor/php-email-form/validate.js"></script>

  <script src="/ninestars/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <script src="/ninestars/assets/vendor/venobox/venobox.min.js"></script>

  <script src="/ninestars/assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <script src="/ninestars/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->

  <script src="/ninestars/assets/js/main.js"></script>



</body>
</html>