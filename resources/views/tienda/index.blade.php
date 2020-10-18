@extends('plantilla.plantilla')

@section('titulo','Metalurgica San Marcos')

@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css')}}"> 
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0"></script>
@endsection

@section('contenido')
	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<!-- Home Slider -->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Slide -->
					@foreach ($slider as $slide)

						<div class="owl-item">
							<div class="background_image" style="background-image:url(fuentes/slider-1.jpg)"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">
											<br/><br/>
												<div class="home_title">{{$slide->nombre}}</div>
												<div class="home_subtitle">{{$slide->category->nombre}}</div>
												<br/>
												<div class="home_items">
													<div class="row">
														<div class="col-sm-2 ">														
														</div>
														<div class="col-lg-8 col-md-8 col-sm-8 ">
															<div class="product home_item_large" style='max-height:450px;'>
																
																<div class="product_image"><img src="{{$slide->images[0]->url }}" alt="" ></div>
																
															</div>
														</div>
														<div class="col-sm-2">
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					@endforeach 
					
				</div>
				<div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

				<!-- Home Slider Dots -->
				
				<div class="home_slider_dots_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_dots">
									<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
										<li class="home_slider_custom_dot active">01</li>
										<li class="home_slider_custom_dot">02</li>
										<li class="home_slider_custom_dot">03</li>
										<li class="home_slider_custom_dot">04</li>
									</ul>
								</div>
							</div>
						</div>
					</div>	
				</div>

			</div>
		</div>










		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center">Destacados</div>
					</div>
				</div>
				<br/>
				<div class="row products_row">
					 
				@foreach ($destacados as $destacado)
 
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image">
							<a href="/producto/{{$destacado->slug}}">
							<img src="{{$destacado->images[0]->url}}" alt="">
							</a></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="/producto/{{$destacado->slug}}">{{$destacado->nombre}}</a></div>
											
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="product_category"><a href="/category/{{$destacado->category->slug}}">{{$destacado->category->nombre}}</a></div> 
									</div>
								</div> 
							</div>
						</div>
					</div>
				@endforeach

				</div>
				 
			</div>
		</div>



	<!-- Lo mas visto -->


<div class="lomasvendidocontenedor">
	<div class="section_title text-center">Últimos productos</div>	
	<br> 	 
			<div class="lomasvendido owl-carousel owl-theme">

						 
				@foreach ($ultimos as $ultimo)
  

					<div class="">
							<div class="product">
								<div class="product_image">
								<a href="/producto/{{$ultimo->slug}}">
		 							<img src="{{$ultimo->images[0]->url}}"/>
								</div>
								<div class="product_content">
									<div class="product_info d-flex flex-row align-items-start justify-content-start">
										<div>
											<div>
												<div class="product_name"><a href="/producto/{{$ultimo->slug}}">{{$ultimo->nombre}}</a></div>
												
											</div>
										</div>
										<div class="ml-auto text-right">
											<div class="product_category"> <a href="/category/{{$ultimo->category->slug}}">{{$ultimo->category->nombre}}</a></div> 
										</div>
									</div>
									 
								</div>
							</div>
						</div>
				 
				@endforeach 



				</div>
	
			</div>		
	</div>
</div>

<br>

<br>

<br>

 
	<div class="section_title text-center">Novedades en nuestras redes</div>	<br/><br/>
<div style='width:100%;text-align:center;'>
<div class="fb-page" data-href="https://www.facebook.com/Metal&#xfa;rgica-San-Marcos-250425142568697/" data-tabs="timeline" data-width="400" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Metal&#xfa;rgica-San-Marcos-250425142568697/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Metal&#xfa;rgica-San-Marcos-250425142568697/">Metalúrgica San Marcos</a></blockquote></div>
</div>
 
		
		<br>

 
		<br>
		
		<br>
		
		<br>


		<!-- Boxes -->

		<div class="boxes" style='display:none;'>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap">

							<!-- Box -->
							<div class="box">
								<div class="background_image" style="background-image:url(fuentes/fotos/a14.jpg)"></div>
								<div class="box_content d-flex flex-row align-items-center justify-content-start">
									<div class="box_left">
										<div class="box_image">
											<a href="category.html">
												<div class="background_image" style="background-image:url(fuentes/fotos/a14.jpg)"></div>
											</a>
										</div>
									</div>
									<div class="box_right text-center">
										<div class="box_title">Tanques cilindricos</div>
									</div>
								</div>
							</div>

							<!-- Box -->
							<div class="box">
								<div class="background_image" style="background-image:url(fuentes/fotos/semi.jpg)"></div>
								<div class="box_content d-flex flex-row align-items-center justify-content-start">
									<div class="box_left">
										<div class="box_image">
											<a href="category.html">
												<div class="background_image" style="background-image:url(fuentes/fotos/semi.jpg)"></div>
											</a>
										</div>
									</div>
									<div class="box_right text-center">
										<div class="box_title">Semiremolques</div>
									</div>
								</div>
							</div>

							<!-- Box -->
							<div class="box">
								<div class="background_image" style="background-image:url(fuentes/fotos/acoplado.jpg)"></div>
								<div class="box_content d-flex flex-row align-items-center justify-content-start">
									<div class="box_left">
										<div class="box_image">
											<a href="category.html">
												<div class="background_image" style="background-image:url(fuentes/fotos/acoplado.jpg)"></div>
											</a>
										</div>
									</div>
									<div class="box_right text-center">
										<div class="box_title">Sobre Camión</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Features -->

		<div class="features">
			<div class="container">
				<div class="row">
					
					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="fuentes/icons/stock.png" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Stock de Repuestos</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon ml-auto mr-auto"><img src="fuentes/icons/calidad.png" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Garantía de calidad</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon  ml-auto mr-auto"  style='left:-10px;top:-32px!important;'><img src="fuentes/icons/personal.png" alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title" style='left:-28px;'>Personal especializado</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
@endsection