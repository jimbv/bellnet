@extends('plantilla.web')
@section('cabecera')
<title>Bellnet | Sistemas simples, soluciones claras</title>
<meta name="description" content="Desarrollamos sistemas web simples y confiables. Hablamos claro, sin vender humo, y acompañamos a empresas y profesionales con soluciones reales." />

@endsection
@section('contenido')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                <h1>Sistemas simples. Soluciones claras.</h1>
                <h2>
                    Desarrollamos sistemas y sitios web simples, funcionales y fáciles de usar, pensados para acompañar el día a día de tu negocio.
                </h2>

                <a href="#contact" class="btn-get-started scrollto">Contactanos</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="ninestars/assets/img/hero-img.svg" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<br> <br>
<p></p>
<!-- ======= About Section ======= -->

<section id="services" class="about">

    <div class="container">

        <br> <br>

        <div class="row justify-content-between">

            <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                <img src="ninestars/assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
            </div>

            <div class="col-lg-6 pt-5 pt-lg-0">
                <h3 data-aos="fade-up">Soluciones web pensadas para negocios reales</h3>


                <p data-aos="fade-up" data-aos-delay="100">
                    Más de 15 años desarrollando sistemas web simples, estables y mantenibles.
                    Nos enfocamos en resolver problemas concretos, sin vueltas y sin vender humo.
                </p>


                <div class="row">

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">

                        <i class="bx bx-receipt"></i>

                        <h4>Desarrollamos una solución clara</h4>
                        <p>
                            Creamos sistemas a medida, usando herramientas probadas y pensando en el largo plazo.
                        </p>

                    </div>

                     

                </div>

            </div>
        </div>
    </div>

</section><!-- End About Section -->



<!-- ======= Services Section ======= -->

<section class="services section-bg">

    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <p>Servicios</p>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

                <div class="icon-box">

                    <div class="icon"><i class="bx bxl-dribbble"></i></div>

                    <h4 class="title"><a href="">Desarrollo de sistemas web</a></h4>
                    <p class="description">
                        Sistemas de gestión, turneros digitales y sitios web hechos a medida.
                        Simples de usar y pensados para crecer.
                    </p>


                </div>

            </div>



            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">

                <div class="icon-box">

                    <div class="icon"><i class="bx bx-file"></i></div>

                    <h4 class="title"><a href="">Consultoría y soporte</a></h4>
                    <p class="description">
                        Asesoramiento técnico, mejoras, mantenimiento y soporte continuo.
                        Te acompañamos después del desarrollo.
                    </p>


                </div>

            </div>



            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">

                <div class="icon-box">

                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Publicidad en Google</a></h4>
                    <p class="description">
                        Gestión de campañas simples y eficientes para que tu negocio gane visibilidad.
                    </p>


                </div>

            </div>



            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">

                <div class="icon-box">

                    <div class="icon"><i class="bx bx-world"></i></div>

                    <h4 class="title"><a href="">Hosting administrado</a></h4>
                    <p class="description">
                        Alojamiento en servidores confiables, con mantenimiento y soporte personalizado.
                    </p>
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




<!-- ======= Portfolio Section =======

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

</section> -->
<!-- End Portfolio Section -->



<!-- ======= F.A.Q Section ======= 

<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">

            <h2>F.A.Q</h2>

            <p>Preguntas Frecuentes</p>

        </div>
        <ul class="faq-list">



            <li>

                <a data-toggle="collapse" class="" href="#faq1" class="collapsed">¿Por qué realizar el desarrollo de un sistema
                    sobre Web? <i class="icofont-simple-up"></i></a>

                <div id="faq1" class="collapse show" data-parent=".faq-list">

                    <p>
                        La evolución de la web llevó a que las tecnologías cliente-servidor permitan dotar de toda clase de
                        funcionalidades a los sitios como asi también
                        desarrollar los más ambiciosos sistemas corporativos realizando una revolución en la industria.
                    </p>
                    <p>
                        El desarrollo orientado a web cabe para todos los propósitos, siendo más homogéneo y multiplataforma,
                        y dependiendo de las tecnologías utilizadas, más rápido y robusto tanto para diseñar,
                        implementar y probar, como para su uso una vez terminado.
                    </p>
                    <p>
                        Los sistemas web amplian las posibilidades aumentando la accesibilidad y reduciendo la complejidad de
                        instalación y configuración con los que
                        otros sistemas cuentan.
                    </p>

                </div>

            </li>



            <li>

                <a data-toggle="collapse" href="#faq2" class="collapsed">¿Qué se necesita para tener un sistema o sitio web? <i class="icofont-simple-up"></i></a>

                <div id="faq2" class="collapse" data-parent=".faq-list">

                    <p>

                        El sitio o sistema que va a desarrollar necesita estar alojado en un servidor desde donde los clientes van a
                        poder acceder.
                        Al servicio de alquilar un servidor temporalmente se lo conoce como <strong>Hosting</strong>, el mismo debe
                        contar cumplir con los requerimientos del proyecto.
                        Ofrecemos como opción nuestro servicio de hosting con servidor dedicado, mantenimiento de bases de datos y
                        atención personalizada.
                    </p>
                    <p> También es necesario para los sitios gestionar el dominio o nombre de la página ante la autoridad
                        competente. Para este trámite realizamos el asesoramiento.
                    </p>
                    <p> Se recomienda también gestionar un certificado de seguridad SSL. En el caso del que servicio de hosting
                        sea nuestro tambien lo podremos configurar sino deberá hablarlo con su servicio de soporte IT.
                        El certificado aporta cifrado para sus conexiones y suma fiabilidad a la experiencia de navegación ya que
                        evita las advertencias de "sitio inseguro" que puedan recaer sobre el suyo.
                    </p>

                </div>

            </li>

            <li>

                <a data-toggle="collapse" href="#faq3" class="collapsed">¿Mi sitio o sistema web requiere mantenimiento? <i class="icofont-simple-up"></i></a>

                <div id="faq3" class="collapse" data-parent=".faq-list">

                    <p>
                        Sí, la solidez de un sistema se encuentra muy relacionada con lo actualizados que se encuentren sus
                        componentes,
                        mantenerlos actualizados es una tarea necesaria para evitar exponerse a vulnerabilidades,
                        aprovechar nuevas tecnologías que vuelvan más eficientes las funciones y no permitir inhabilitaciones
                        de servicios debido a módulos que se vuelven obsoletos.
                    </p>
                    <p> El dinamismo del contexto y la importancia de la información hacen necesario el soporte como una actividad
                        tan
                        o más esencial que el desarrollo para la vida de un sistema. Ofrecemos soporte para actualizaciones y
                        mejoras sobre los desarrollos
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

                <a data-toggle="collapse" href="#faq5" class="collapsed">¿Puedo delegar el diseño de mi sitio o interfaces a mi
                    departamento creativo o tercerizarlo?<i class="icofont-simple-up"></i></a>

                <div id="faq5" class="collapse" data-parent=".faq-list">

                    <p>
                        Seguro, es una buena opción que recomendamos siempre que esté a disposición del cliente. El diseño gráfico
                        ayuda mucho
                        en la experiencia del usuario y es muy importante en los sitios web. Recomendamos que el diseñador o
                        creativo a cargo tenga
                        conocimiento particular de las interfaces web. Es muy bueno que el trabajo sea colaborativo y que cada
                        arista del proyecto
                        sea considerada con la importancia adecuada.
                    </p>

                </div>

            </li>
            <li>

                <a data-toggle="collapse" href="#faq6" class="collapsed">¿Cómo hago para que mi sitio sea mas visible en
                    buscadores? <i class="icofont-simple-up"></i></a>

                <div id="faq6" class="collapse" data-parent=".faq-list">
                    <p>
                        Hay dos tipos de posicionamiento, el primero es el orgánico (SEO) en el que le damos palabras claves a los
                        rastreadores
                        de los buscadores para que clasifiquen la página y los damos de alta en varios directorios web ya que el
                        sistema de
                        ponderación de los sitios asigna más valor a aquellos que estén mas relacionados.
                    </p>
                    <p>
                        Por otro lado existe el posicionamiento pago (SEM) en el que Google se destaca por sobre sus competidores.
                        <br />
                        Google Adwords es un sistema de publicidad mediante el cual se crean anuncios que serán
                        incorporados de manera especial en el buscador Google y en páginas asociadas.
                        Los anuncios se administran de manera automática en base a la demanda de publicidad que
                        tenga y el costo es en base al uso. De esta manera nuestros clientes pueden controlar su
                        inversión ya que solamente se le cobrará cuando alguien haga click en su anuncio
                        descontandose el precio por click de un presupuesto diario preestablecido.

                    </p>

                    <p>
                        Realizamos capacitaciones para organizar campañas de anuncios en este sistema utilizando estrategias de puja
                        y herramientas avanzadas de administración para que los resultados sean los óptimos.

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

</section>-->
<!-- End F.A.Q Section -->



<!-- ======= Team Section ======= -->

<section id="team" class="team">

    <div class="container">



        <div class="section-title" data-aos="fade-up">

            <h2>Quién está detrás de Bellnet</h2>
<p>Un compromiso claro con cada cliente</p>

        </div>



        <div class="row">



            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">

                <div class="member">

                    <img src="/imgs/josemartin.png" class="img-fluid" alt="">

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

                Desde hace más de 15 años trabajo desarrollando sistemas y soluciones web,
                acompañando a empresas, instituciones y profesionales.
<p></p>
                Creo en la tecnología clara, en hablar sin vueltas y en construir sistemas
                que realmente sirvan para el trabajo diario.
                No vendo promesas: propongo soluciones posibles y las llevo a la práctica.
<p></p>
                Agradezco la confianza de cada cliente y mantengo el compromiso
                de seguir trabajando con la misma responsabilidad y cercanía de siempre.
                <br /><br />

                <i>
                    “La ciencia ha eliminado las distancias. Dentro de poco, el hombre podrá ver lo que ocurre en cualquier lugar de la tierra, sin moverse de su casa.”
                </i>
                <br />
                — Cien Años de Soledad




            </div>













        </div>



    </div>

</section><!-- End Team Section -->



<!-- ======= Clients Section ======= -->

<section id="clients" class="clients section-bg">

    <div class="container">



        <div class="section-title" data-aos="fade-up">

            <h2>Algunos de nuestros clientes</h2>

        </div>



        <div class="owl-carousel clients-carousel" data-aos="fade-up" data-aos-delay="100">
            <img src="/imgs/clientes/cas-logo.png" alt="CAS">
            <a href="http://www.kiboaluminio.com.ar" target='_blank'>
                <img src="/imgs/clientes/kibo.png" alt="Kibo Aluminio">
            </a>
            <img src="/imgs/clientes/sokam.png" alt="Sokam SRL">
            <img src="/imgs/clientes/osecac.png" alt="Osecac">
            <img src="/imgs/clientes/ostamma.png" alt="Ostamma">
            <img src="/imgs/clientes/agro-pur.png" alt="">
            <img src="/imgs/clientes/bellcolor.png" alt="">
            <img src="/imgs/clientes/baiocchi.png" alt="Baiocchi Hnos"> 
            <img src="/imgs/clientes/click.png" style="position:relative;top:0px;top:-20px;" alt="Click Comunicación">
            <img src="/imgs/clientes/solares.png" alt="Solares de pilar">

        </div>
    </div>

</section><!-- End Clients Section -->



<!-- ======= Contact Us Section ======= -->

<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">

            <h2>Hablamos</h2>

<p>Contanos qué necesitás y vemos cómo ayudarte</p>

        </div>



        <div class="row">



            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Ubicación:</h4>
                        <p>
                            Bell Ville (2550) <br />
                            Córdoba
                        </p>
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


                    <iframe src="https://www.google.com/maps/d/embed?mid=1zgyZCy1R7sJ8NKkOEGL1ZSuqtTsH64Q&ehbc=2E312F&noprof=1" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <form id="contact-form" action="{{ route('contact.submit') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    @method('POST')

                    <h2 style='color:#EB5D1E;width:100%;'>

                    </h2>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="name">Nombre y Apellido</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />
                            <div class="validate"></div>{!!$errors->first('nombre','<br />
                            <div style="color:red;">:message</div><br />')!!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Ingresa una dirección de email válida" />
                            <div class="validate"></div>{!!$errors->first('email','<br />
                            <div style="color:red;">:message</div><br />')!!}
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <label for="name">Localidad</label>

                            <input type="text" name="localidad" class="form-control" id="localidad" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />

                            <div class="validate"></div>{!!$errors->first('localidad','<br />
                            <div style="color:red;">:message</div><br />')!!}

                        </div>

                        <div class="form-group col-md-6">

                            <label for="name">Teléfono</label>

                            <input type="text" name="telefono" class="form-control" id="telefono" data-rule="minlen:4" data-msg="Por favor ingresa al menos cuatro letras" />

                            <div class="validate"></div>{!!$errors->first('telefono','<br />
                            <div style="color:red;">:message</div><br />')!!}

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="name">Asunto</label>

                        <input type="text" class="form-control" name="asunto" id="asunto" data-rule="minlen:4" data-msg="El asunto debe tener al menos ocho letras" />

                        <div class="validate"></div>{!!$errors->first('asunto','<br />
                        <div style="color:red;">:message</div><br />')!!}

                    </div>

                    <div class="form-group">

                        <label for="name">Mensaje</label>

                        <textarea class="form-control" name="mensaje" rows="10" data-rule="required" data-msg="Por favor completa el mensaje"></textarea>

                        <div class="validate"></div>{!!$errors->first('mensaje','<br />
                        <div style="color:red;">:message</div><br />')!!}

                    </div>

                    <div class="mb-3">

                        <div class="loading">Cargando</div>

                        <div class="error-message"></div>
                        <div class="sent-message">

                            @if($errors->any())
                            <div style='color:red;'>No se pudo enviar el formulario, por favor revise los errores.</div>
                            @endif




                        </div>

                    </div>

                    <div class="text-center"><button type="submit" onclick="document.getElementById('contact-form').submit();">Enviar mensaje</button></div>

                </form>

            </div>
        </div>
    </div>
</section><!-- End Contact Us Section -->


@endsection