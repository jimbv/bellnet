@extends('plantilla.web')
@section('cabecera')
  <title>Bellnet | Desarrollo Web </title>
  <meta name="description" content="Bellnet es una empresa que se dedica al desarrollo sistemas basados en web."/>
@endsection 
@section('contenido') 

  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center"> 
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">

          <h1>Innovación para que su empresa despegue</h1>

          <h2>Desarrollamos sistemas para el manejo de información ante una mirada de las posibilidades que brindan las tecnologías basadas en Web.</h2>

          <a href="#contact" class="btn-get-started scrollto">Contactanos</a>

        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img">

          <img src="ninestars/assets/img/hero-img.svg" class="img-fluid animated" alt="">

        </div>

      </div>

    </div>



  </section><!-- End Hero -->


 <br> <br> <p></p>


    <!-- ======= About Section ======= -->

    <section id="services" class="about">

      <div class="container">

<br> <br>

        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">

            <img src="ninestars/assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">

          </div>

          <div class="col-lg-6 pt-5 pt-lg-0">

            <h3 data-aos="fade-up">Soluciones basadas en web</h3>

            <p data-aos="fade-up" data-aos-delay="100">

            Más de 15 años ofreciendo sistemas con las mejores tecnologías.

            </p>

            <div class="row">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">

                <i class="bx bx-receipt"></i>

                <h4>Ponemos el problema sobre la mesa</h4>

                <p>Analizamos e Investigamos las necesidades de la empresa y los usuarios.</p>

              </div>

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">

                <i class="bx bx-cube-alt"></i>

                <h4>Y desarrollamos la solución</h4>

                <p>Con metodologías ágiles y las mejores herramientas.</p>

              </div>

            </div>

          </div>

        </div>



      </div>

    </section><!-- End About Section -->



    <!-- ======= Services Section ======= -->

    <section   class="services section-bg">

      <div class="container">



        <div class="section-title" data-aos="fade-up">
 

          <p>Nuestros Servicios</p>

        </div>



        <div class="row">

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

            <div class="icon-box">

              <div class="icon"><i class="bx bxl-dribbble"></i></div>

              <h4 class="title"><a href="">Desarrollo web</a></h4>

              <p class="description">Desarrollo de sistemas y sitios basados en tecnologías web.</p>

            </div>

          </div>



          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">

            <div class="icon-box">

              <div class="icon"><i class="bx bx-file"></i></div>

              <h4 class="title"><a href="">Consultas e informes</a></h4>

              <p class="description">Servicio de consultoría y presentación de informes.</p>

            </div>

          </div>



          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">

            <div class="icon-box">

              <div class="icon"><i class="bx bx-tachometer"></i></div>

              <h4 class="title"><a href="">Google Adwords</a></h4>

              <p class="description">Campañas Marketing con publicidad en buscadores.</p>

            </div>

          </div>



          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">

            <div class="icon-box">

              <div class="icon"><i class="bx bx-world"></i></div>

              <h4 class="title"><a href="">Hosting</a></h4>

              <p class="description">Alojamiento en servidores dedicados con soporte técnico exclusivo.</p>

            </div>

          </div>



        </div>



      </div>

    </section><!-- End Services Section -->


    <section id="novedades" class="team">

      <div class="container">



        <div class="section-title" data-aos="fade-up">
 
          <p>Novedades</p>

        </div>



        <div class="row">

          @foreach ($noticias as $noticia) 

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <a href="noticia/{{$noticia->slug}}">
            <div class="member">
              @if ($noticia->images->count()>0) 
              <img src="{{$noticia->images->random()->url}}" class="img-fluid" alt="">
              @endif

              <div class="member-info">

                <div class="member-info-content" style='text-align:center; width:100%;left:0px;padding:10px;bottom:5px;'>

                  <h4>{{$noticia->titulo}}</h4>

                  <!--<span>Prop</span>-->

                </div>
 

              </div>

            </div>
            </a>
          </div>

          @endforeach
           



      </div>

    </section><!-- End Novedades Section -->




    <!-- ======= Portfolio Section ======= -->

    <section id="portfolio" class="portfolio">

      <div class="container">



        <div class="section-title" data-aos="fade-up">

          <h2>Portfolio</h2>

          <p>Algunos de nuestros trabajos</p>

        </div>



        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12">

            <ul id="portfolio-flters">

              <li data-filter="*" class="filter-active">Todos</li>

              <li data-filter=".filter-app">Sistemas</li>

              <li data-filter=".filter-card">APP</li>

              <li data-filter=".filter-web">Web</li>

            </ul>

          </div>

        </div>



        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">



         



          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/baiocchi.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/baiocchi.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>

                <a href="#" title="More Details"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>Baiocchi</h4>

                <p>Web</p>

              </div>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/kiboaluminio.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/kiboaluminio.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>

                <a href="http://www.kiboaluminio.com.ar" target='_blank' title="Enlace"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>Baiocchi</h4>

                <p>Web</p>

              </div>

            </div>

          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/analiamorad.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/analiamorad.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>

                <a href="http://www.analiamorad.com.ar" target='_blank' title="Enlace"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>Analía Morad</h4>

                <p>Web</p>

              </div>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-app">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/cas.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/cas.png" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-plus-circle"></i></a>

                <a href="#" title="More Details"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>CAS Servicios</h4>

                <p>Web</p>

              </div>

            </div>

          </div>



          <div class="col-lg-4 col-md-6 portfolio-item filter-card">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/bellcolor.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/bellcolor.png" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus-circle"></i></a>

                <a href="#" title="More Details"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>Bellcolor</h4>

                <p>Web</p>

              </div>

            </div>

          </div> 




          <div class="col-lg-4 col-md-6 portfolio-item filter-card">

            <div class="portfolio-wrap">

              <img src="/img/portfolio/solares.png" class="img-fluid" alt="">

              <div class="portfolio-links">

                <a href="/img/portfolio/solares.png" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus-circle"></i></a>

                <a href="#" title="More Details"><i class="icofont-link"></i></a>

              </div>

              <div class="portfolio-info">

                <h4>Solares de Pilar</h4>

                <p>Sistema</p>

              </div>

            </div>

          </div> 



        </div>



      </div>

    </section><!-- End Portfolio Section -->



    <!-- ======= F.A.Q Section ======= -->

    <section id="faq" class="faq section-bg">

      <div class="container">



        <div class="section-title" data-aos="fade-up">

          <h2>F.A.Q</h2>

          <p>Preguntas Frecuentes</p>

        </div>



        <ul class="faq-list">



          <li>

            <a data-toggle="collapse" class="" href="#faq1" class="collapsed">¿Por qué realizar el desarrollo de un sistema sobre Web? <i class="icofont-simple-up"></i></a>

            <div id="faq1" class="collapse show" data-parent=".faq-list">

              <p> 
              La evolución de la web llevó a que las tecnologías cliente-servidor permitan dotar de toda clase de funcionalidades a los sitios como asi también 
              desarrollar los más ambiciosos sistemas corporativos realizando una revolución en la industria.
              </p>
              <p>
               El desarrollo orientado a web cabe para todos los propósitos, siendo más homogéneo y multiplataforma, 
               y dependiendo de las  tecnologías utilizadas, más rápido y robusto tanto para diseñar, 
               implementar y probar, como para su uso una vez terminado.
              </p>
              <p>
               Los sistemas web amplian las posibilidades aumentando la accesibilidad y reduciendo la complejidad de instalación y configuración con los que 
               otros sistemas cuentan.
              </p>

            </div>

          </li>



          <li >

            <a data-toggle="collapse" href="#faq2" class="collapsed">¿Qué se necesita para tener un sistema o sitio web? <i class="icofont-simple-up"></i></a>

            <div id="faq2" class="collapse" data-parent=".faq-list">

              <p>

              El sitio o sistema que va a desarrollar necesita estar alojado en un servidor desde donde los clientes van a poder acceder. 
              Al servicio de alquilar un servidor temporalmente se lo conoce como <strong>Hosting</strong>, el mismo debe contar cumplir con los requerimientos del proyecto.
              Ofrecemos como opción nuestro servicio de hosting con servidor dedicado, mantenimiento de bases de datos y atención personalizada.
              </p>
              <p> También es necesario para los sitios gestionar el dominio o nombre de la página ante la autoridad competente. Para este trámite realizamos el asesoramiento.
              </p>
              <p> Se recomienda también gestionar un certificado de seguridad SSL. En el caso del que servicio de hosting sea nuestro tambien lo podremos configurar sino deberá hablarlo con su servicio de soporte IT.
              El certificado aporta cifrado para sus conexiones y suma fiabilidad a la experiencia de navegación ya que evita las advertencias de "sitio inseguro" que puedan recaer sobre el suyo.
              </p>

            </div>

          </li>

          <li>

            <a data-toggle="collapse" href="#faq3" class="collapsed">¿Mi sitio o sistema web requiere mantenimiento? <i class="icofont-simple-up"></i></a>

            <div id="faq3" class="collapse" data-parent=".faq-list">

              <p> 
              Sí, la solidez de un sistema se encuentra muy relacionada con lo actualizados que se encuentren sus componentes, 
              mantenerlos actualizados es una tarea necesaria para evitar exponerse a vulnerabilidades,
               aprovechar nuevas tecnologías que vuelvan más eficientes las funciones y no permitir inhabilitaciones 
               de servicios debido a módulos que se vuelven obsoletos.
              </p>
              <p> El dinamismo del contexto y la importancia de la información hacen necesario el soporte como una actividad tan
              o más esencial que el desarrollo para la vida de un sistema. Ofrecemos soporte para actualizaciones y mejoras sobre los desarrollos 
              propios asi como también recibimos sistemas para mantenimiento.
              </p> 

            </div>

          </li>
          <li>

          <a data-toggle="collapse" href="#faq4" class="collapsed">¿Qué tan importante es realizar Backups?<i class="icofont-simple-up"></i></a>

          <div id="faq4" class="collapse" data-parent=".faq-list">

            <p> 
            Dependiendo de los cambios y la importancia de la información almacenada, los backups o copias de seguridad 
            son una buena práctica que fomentamos y para el caso de sistemas con información 
            sensibles recomendamos llevar un cronograma con periodos de tiempo establecidos.
            </p> 

          </div>

          </li>
          <li>

            <a data-toggle="collapse" href="#faq5" class="collapsed">¿Puedo delegar el diseño de mi sitio o interfaces a mi departamento creativo o tercerizarlo?<i class="icofont-simple-up"></i></a>

            <div id="faq5" class="collapse" data-parent=".faq-list">

              <p> 
              Seguro, es una buena opción que recomendamos siempre que esté a disposición del cliente. El diseño gráfico ayuda mucho 
              en la experiencia del usuario y es muy importante en los sitios web. Recomendamos que el diseñador o creativo a cargo tenga 
              conocimiento particular de las interfaces web. Es muy bueno que el trabajo sea colaborativo y que cada arista del proyecto 
              sea considerada con la importancia adecuada.  
              </p> 

            </div>

            </li>
          <li>

            <a data-toggle="collapse" href="#faq6" class="collapsed">¿Cómo hago para que mi sitio sea mas visible en buscadores? <i class="icofont-simple-up"></i></a>

            <div id="faq6" class="collapse" data-parent=".faq-list">
              <p>
              Hay dos tipos de posicionamiento, el primero es el orgánico (SEO) en el que le damos palabras claves a los rastreadores 
                de los buscadores para que clasifiquen la página y los damos de alta en varios directorios web ya que el sistema de 
                ponderación de los sitios asigna más valor a aquellos que estén mas relacionados.
              </p>
              <p>
              Por otro lado existe el posicionamiento pago (SEM) en el que Google se destaca por sobre sus competidores. <br/>
              Google Adwords es un sistema de publicidad mediante el cual se crean anuncios que serán
               incorporados de manera especial en el buscador Google y en páginas asociadas. 
               Los anuncios se administran de manera automática en base a la demanda de publicidad que 
               tenga y el costo es en base al uso. De esta manera nuestros clientes pueden controlar su 
               inversión ya que solamente se le cobrará cuando alguien haga click en su anuncio 
               descontandose el precio por click de un presupuesto diario preestablecido.

              </p>

              <p>
              Realizamos capacitaciones para organizar campañas de anuncios en este sistema utilizando estrategias de puja y herramientas avanzadas de administración  para que los resultados sean los óptimos.

              </p>


            </div>

          </li>



          <li>

            <a data-toggle="collapse" href="#faq7" class="collapsed">¿Realizan outsourcing o subcontrataciones? <i class="icofont-simple-up"></i></a>

            <div id="faq7" class="collapse" data-parent=".faq-list">

              <p>

               Sí, para el desarrollo de todo tipo de sistemas.
               </p>

                  Servicio recomendable para diseñadores gráficos que quieran ofrecer funcionalidad 
                  web a sus clientes. 
                </p>

              <p>

                Tecnologías de programación y acceso a datos: PHP, Laravel, Ajax, Java, Javascript, MySQL, PostgreSQL.
                
              </p>

            </div>

          </li>



            


        </ul>



      </div>

    </section><!-- End F.A.Q Section -->



    <!-- ======= Team Section ======= -->

    <section id="team" class="team">

      <div class="container">



        <div class="section-title" data-aos="fade-up">

          <h2>Desarrollamos</h2>

          <p>Un compromiso claro</p>

        </div>



        <div class="row">



          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">

            <div class="member">

              <img src="/img/josemartin.jpg" class="img-fluid" alt="">

              <div class="member-info">

                <div class="member-info-content">

                  <h4>José Martín</h4>

                  <!--<span>Prop</span>-->

                </div>

                <div class="social">

                  <a href="https://twitter.com/jimbv"><i class="icofont-twitter"></i></a>

                  <a href="https://www.facebook.com/people/Jos%C3%A9-Mart%C3%ADn/100007964464208"><i class="icofont-facebook"></i></a>

                  <a href="http://www.instagram.com/jose_martin_bv"><i class="icofont-instagram"></i></a>

                  <a href="http://jimbv.wordpress.com/"><i class="icofont-web"></i></a>

                </div>

              </div>

            </div>

          </div>



          <div class="col-xl-9 col-lg-8 col-md-6" data-aos="fade-up">

          Desde hace más de 15 años y entendiendo que internet sería la gran revolución de nuestros tiempos trabajo en este rubro, 

          formándome, investigando con pasión las nuevas tecnologías y los alcances propuestos, buscando la innovación constante y tratando 

          de llevar a mis clientes el resultado de esto. <br/><br/>

          Agradezco todas y cada oportunidad que me dan para trabajar y mantengo mi compromiso de seguir este camino.<br/><br/><br/>

          <i>“La ciencia ha eliminado las distancias. Dentro de poco, el hombre podrá ver lo que ocurre en cualquier lugar de la tierra, 

          sin moverse de su casa.”</i> - Melquíades el mago, Cien Años de Soledad. 



          </div>













        </div>



      </div>

    </section><!-- End Team Section -->



    <!-- ======= Clients Section ======= -->

    <section id="clients" class="clients section-bg">

      <div class="container">



        <div class="section-title" data-aos="fade-up">

          <h2>Nuestros clientes</h2>

          <p>Gracias por la confianza</p>

        </div>



        <div class="owl-carousel clients-carousel" data-aos="fade-up" data-aos-delay="100">

          <img src="/img/clientes/cas-logo.png" alt="CAS">
          
          <a href="http://www.kiboaluminio.com.ar" target='_blank'>
            <img src="/img/clientes/kibo.png" alt="Kibo Aluminio">
          </a>
          <img src="/img/clientes/sokam.png" alt="Sokam">

          <img src="/img/clientes/cec.png" alt="CEC">

          <img src="/img/clientes/agro-pur.png" alt="">

          <img src="/img/clientes/bellcolor.png" alt="">

          <img src="/img/clientes/baiocchi.png" alt="">

          <img src="/img/clientes/estefania.png" alt=""> 

          <img src="/img/clientes/genik.png" alt=""> 

          <img src="/img/clientes/solares.png" alt=""> 

        </div>



      </div>

    </section><!-- End Clients Section -->



    <!-- ======= Contact Us Section ======= -->

    <section id="contact" class="contact">

      <div class="container">



        <div class="section-title" data-aos="fade-up">

          <h2>Hablamos</h2>

          <p>Contactate por cualquiera de nuestros medios</p>

        </div>



        <div class="row">



          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

            <div class="info">

              <div class="address">

                <i class="icofont-google-map"></i>

                <h4>Ubicación:</h4>

                <p>Villa María (5900) <br/>

                Córdoba</p>

              </div>



              <div class="email">

                <i class="icofont-envelope"></i>

                <h4>Email:</h4>

                <p>info@bellnet.com.ar</p>

              </div>



              <div class="phone">

                <i class="icofont-phone"></i>

                <h4>Teléfono:</h4>

                <p>+549 3537 609004</p>

              </div>

              <!--

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                -->

            </div>



          </div>

       



          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">

            <form id="contact-form"  action="{{ route('Contacto') }}#contact" method="post" role="form" class="php-email-form">

            @csrf

            @method('POST')

		
            <h2 style='color:#EB5D1E;width:100%;'>
            {!! $resultado ?? '' !!}
            </h2>
			

   



            <div class="form-row">

                <div class="form-group col-md-6">

                  <label for="name">Nombre y Apellido</label>

                  <input type="text" name="nombre" class="form-control" id="nombre" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />

                  <div class="validate"></div>{!!$errors->first('nombre','<br/><div style="color:red;">:message</div><br/>')!!}

                </div>

                <div class="form-group col-md-6">

                  <label for="name">Email</label>

                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Ingresa una dirección de email válida" />

                  <div class="validate"></div>{!!$errors->first('email','<br/><div style="color:red;">:message</div><br/>')!!}

                </div>

              </div>

              <div class="form-row">

                <div class="form-group col-md-6">

                  <label for="name">Localidad</label>

                  <input type="text" name="localidad" class="form-control" id="localidad" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />

                  <div class="validate"></div>{!!$errors->first('localidad','<br/><div style="color:red;">:message</div><br/>')!!}

                </div>

                <div class="form-group col-md-6">

                  <label for="name">Teléfono</label>

                  <input type="text" name="telefono" class="form-control" id="telefono" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />

                  <div class="validate"></div>{!!$errors->first('telefono','<br/><div style="color:red;">:message</div><br/>')!!}

                </div>

              </div>

              <div class="form-group">

                <label for="name">Asunto</label>

                <input type="text" class="form-control" name="asunto" id="asunto" data-rule="minlen:4" data-msg="El asunto debe tener al menos ocho letras" />

                <div class="validate"></div>{!!$errors->first('asunto','<br/><div style="color:red;">:message</div><br/>')!!}

              </div>

              <div class="form-group">

                <label for="name">Mensaje</label>

                <textarea class="form-control" name="mensaje" rows="10" data-rule="required" data-msg="Por favor completa el mensaje"></textarea>

                <div class="validate"></div>{!!$errors->first('mensaje','<br/><div style="color:red;">:message</div><br/>')!!}

              </div>

              <div class="mb-3">

                <div class="loading">Cargando</div>

                <div class="error-message"></div>

                <div class="sent-message">

                

                @if($errors->any())



                <div style='color:red;'>No se pudo enviar el formulario, por favor revise los errores.</div> 



                @endif

                

                {!!$resultado!!}

                </div>

              </div>

              <div class="text-center"><button type="submit" onclick="document.getElementById('contact-form').submit();">Enviar mensaje</button></div>

            </form>

          </div>



        </div>



      </div>

    </section><!-- End Contact Us Section -->


@endsection