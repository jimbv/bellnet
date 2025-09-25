@extends('layouts.plantilla')
@section('contenido')
     <section class="position-relative w-100" style="height: 50vh; border-bottom: 10px solid #f74e04; overflow:hidden;">

            <!-- Video de fondo -->
            <video autoplay muted loop playsinline preload="none"
                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                poster="/static/images/anfi.bafe026b9054.png"
                style="z-index:0;">
                <source src="/videos/video.mp4" type="video/mp4">
                <source src="/videos/video.webm" type="video/webm">
            </video>

            <!-- Overlay negro -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: rgba(0,0,0,0.6); z-index:1;">
            </div>

            <!-- Cuadro de texto centrado verticalmente -->
            <div class="position-absolute top-50 start-50 translate-middle" style="z-index:2; width:90%; max-width:600px;">
                <div style="background: rgba(0,0,0,0.6); color: white; padding: 0.5rem 1rem; 
                text-align:center; box-shadow: none;">
                    <h1 class="h1 fw-bold mb-0" style="font-family: Cloudsters; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                        Tu marca en todas partes <br>y a otro nivel
                    </h1>
                </div>
            </div>

        </section>



        <section class="bg-white">
            <div class="max-w-screen-xl mx-auto px-5 py-10">
                <h2 class="text-2xl md:text-3xl font-black text-primary uppercase text-center mb-10" style="color:#f74e04!important;font-family:Logomark;">Nuestros Servicios</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 place-items-center">

                    @foreach($categories as $category)
                    <a href="/category/{{$category->id}}" target="_blank"
                        style="background-color: {{$category->color}}!important; text-decoration:none;"
                        class="bg-tertiary-2 rounded-xl p-5 flex xl:flex-col justify-start xl:justify-center items-center hover:scale-[1.02] focus:outline-none focus:ring-4 focus:transform-none transition-all w-full xl:w-48 xl:h-48 relative">
                        @if($category->image)
                        <img src="{{$category->image}}" alt="Ícono" class="h-16 xl:h-18 w-auto pr-[15px] xl:pr-0 border-r-2 border-r-white xl:border-none xl:mb-2">
                        @endif
                        <div class="flex flex-col ml-5 xl:ml-0" style="text-decoration:none;">
                            <span class="text-white font-semibold xl:text-center"
                                style="font-size:18px;text-decoration:none;font-family:Logomark;">
                                {{strtoupper($category->name)}}
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div class="max-w-screen-xl mx-auto px-5 py-10">
                <h2 class="text-3xl font-black text-primary uppercase text-center pb-5 mb-10 border-b-2 border-b-primary" style="color:#111e26!important;font-family:Logomark;border-color:#111e26;">Novedades</h2>

                <div class="swiper swiper-novedades">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/7/el-sistema-de-salud-municipal-supero-las-22-mil-atenciones-en-agosto" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/6c0b9c74ae174f0997fc9d03c8e977f4-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">El sistema de salud municipal superó las 22 mil atenciones en agosto</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María informa, a través de la Secretaría de Salud, que durante el mes de agosto se llevaron a cabo 22.658 atenciones médicas a vecinos y vecinas de la ciudad, a través de la Asistencia Pública, los CAPS y diferentes dispositivos sanitarios.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/7/el-parque-pereira-y-dominguez-tendra-una-nueva-plaza-inclusiva" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/b483148576c74d4b9094fb8db5dfbb25-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">El Parque Pereira y Domínguez tendrá una nueva plaza inclusiva</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María, a través de la Secretaría de Infraestructura y Desarrollo Sostenible, informa que avanza la creación de una plaza inclusiva en el Parque Pereira y Domínguez, con la instalación de juegos accesibles que complementan el espacio existente.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/7/vm-piensa-y-propone-desde-manana-comienza-la-etapa-de-votacion-de-proyectos" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/fc69fc6b59ec4bbd8e459e39310fab92-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">VM Piensa y Propone: desde mañana comienza la etapa de votación de proyectos</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María informa que mañana comienza la etapa de votación del programa “VM Piensa y Propone”.

                                        Cabe mencionar que el citado programa, impulsado por el municipio, surgió con el fin de promover una gestión democrática y la participación ciudadana.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/6/se-clausuro-un-bar-de-barrio-centro-por-exceso-de-ocupacion" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/e209a447ba574c85bcb99f478f1e022b-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Se clausuró un bar de barrio Centro por exceso de ocupación</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María, a través de la Secretaría de Prevención, Seguridad y Convivencia Urbana, informa que en la madrugada del sábado se procedió a la clausura preventiva de un bar ubicado en la intersección de calles Corrientes y Belgrano, por exceso en el factor ocupacional.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/6/con-la-colocacion-de-mas-de-70-luces-led-avanza-la-segunda-etapa-de-modernizacion-de-alumbrado-en-barrio-industrial" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/051ba1584cc54f9cb1cc3d0c75c6daba-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Con la colocación de más de 70 luces led, avanza la segunda etapa de modernización de alumbrado en barrio Industrial</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María, a través de la Secretaría de Servicios Urbanos, informa que avanza el recambio de luminarias en barrio Industrial, en el marco del programa “Villa María 100% LED”.

                                        En esta oportunidad, los trabajos se llevan adelante en el cuadrante comprendido entre calles Quintana, Paso de los Libres, Alvear y Perón, donde se instalaron 71 nuevas luces LED que mejorarán la eficiencia lumínica, optimizarán el consumo energético y brindarán mayor seguridad a los vecinos.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/6/barrio-ameghino-se-extiende-la-campana-gratuita-y-descentralizada-de-castracion" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/9f98d5ba194a4b379fdef0eef8672781-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Barrio Ameghino: se extiende la campaña gratuita y descentralizada de castración</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María, a través de la Secretaría de Gobierno, Cultura y Relaciones Institucionales en conjunto con el Centro de Adopción Municipal (CAM), informa que desde el lunes 8 al miércoles 10 de septiembre, a partir de las 8 horas, continuará el servicio de castración gratuita en barrio Ameghino.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/6/agenda-de-coincidencias-el-municipio-trabaja-junto-a-comerciantes-en-la-planificacion-de-politicas-publicas-para-el-sector" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/948e9d17d7214d179ebcc9cced615e42-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Agenda de Coincidencias: el municipio trabaja junto a comerciantes en la planificación de políticas públicas para el sector</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María informa que se realizó una nueva reunión de trabajo con más de diez comerciantes de distintos rubros de la ciudad con el objetivo de fortalecer el sector en el marco de la Agenda de Coincidencias que promueve el Gobierno local.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/6/accastello-participo-de-la-entrega-de-certificados-a-los-egresados-del-nuevo-servicio-especial-de-operaciones-motorizadas" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/432d306b61f948698c52a17f95f3e2af-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Accastello participó de la entrega de certificados a los egresados del nuevo Servicio Especial de Operaciones Motorizadas</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María informa, a través de la Secretaría de Prevención, Seguridad y Convivencia Urbana, que se llevó a cabo la entrega de certificados de egreso a once agentes de la Policía de Córdoba que completaron diversas instancias de formación para integrar el Servicio Especial de Operaciones Motorizadas (SEOM).
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide px-3 py-10">
                            <a href="/novedades/2025/9/5/comenzo-la-obra-de-banos-en-el-skatepark" class="flex flex-col justify-start items-stretch bg-white rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:transform-none focus:ring-4 transition-all overflow-hidden h-[500px]">
                                <img src="/media/novedades/2025/09/6cab8ab257dd42a5a375efe30306e4a0-tn.jpeg" alt="" class="rounded-t-xl object-cover h-64 w-full">
                                <div class="p-5 pb-0 mb-5 overflow-hidden">
                                    <h3 class="text-lg font-semibold text-black mb-5 line-clamp-4">Comenzó la obra de baños en el Skatepark</h3>
                                    <p class="text-sm text-black font-normal line-clamp-3">
                                        La Municipalidad de Villa María informa, a través de la Secretaría de Infraestructura y Desarrollo Sostenible, que iniciaron los trabajos para la construcción de baterías de baños en el Skatepark en respuesta a una demanda de las y los jóvenes que practican allí deportes urbanos.
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="button-prev"></div>
                    <div class="button-next"></div>

                </div>
                <div class="mt-5 mb-5 text-center">
                    <a href="/novedades" class="border-2 border-primary text-primary hover:bg-primary hover:text-white focus:outline-none focus:ring-4 text-sm font-semibold uppercase rounded-md px-4 py-3 transition-colors" style="font-family:Cloudsters;text-decoration:none;">Más novedades</a>
                </div>



            </div>
        </section>
        <section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Lo que dicen nuestros clientes</h2>
            <p class="text-muted">Experiencias reales de quienes confiaron en nosotros</p>
        </div>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Item 1 -->
                <div class="carousel-item active">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “Excelente servicio, superaron mis expectativas. Recomiendo 100%.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 1">
                                    <h6 class="fw-bold mb-0">Juan Pérez</h6>
                                    <small class="text-muted">Empresario</small>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-md-4 d-none d-md-block">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “El producto es de altísima calidad y la atención post-venta impecable.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 2">
                                    <h6 class="fw-bold mb-0">María González</h6>
                                    <small class="text-muted">Diseñadora</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-none d-lg-block">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “Una experiencia excelente desde el primer contacto hasta la entrega final.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 3">
                                    <h6 class="fw-bold mb-0">Carlos López</h6>
                                    <small class="text-muted">Ingeniero</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Item 2 -->
                <div class="carousel-item active">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “Excelente servicio, superaron mis expectativas. Recomiendo 100%.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 1">
                                    <h6 class="fw-bold mb-0">Juan Pérez</h6>
                                    <small class="text-muted">Empresario</small>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-md-4 d-none d-md-block">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “El producto es de altísima calidad y la atención post-venta impecable.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 2">
                                    <h6 class="fw-bold mb-0">María González</h6>
                                    <small class="text-muted">Diseñadora</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-none d-lg-block">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <div class="card-body text-center">
                                    <i class="fas fa-quote-left fa-2x text-primary position-absolute top-0 start-50 translate-middle-x opacity-25"></i>
                                    <p class="card-text fst-italic mt-4">
                                        “Una experiencia excelente desde el primer contacto hasta la entrega final.”
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-0 text-center">
                                    <img src="https://via.placeholder.com/60"
                                         class="rounded-circle mb-2" alt="Cliente 3">
                                    <h6 class="fw-bold mb-0">Carlos López</h6>
                                    <small class="text-muted">Ingeniero</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Podés duplicar más carousel-item con otros testimonios -->

            </div>

            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

@endsection 