@extends('plantilla.plantilla')

@section('titulo','Metalurgica San Marcos - Categoría '.$cat->nombre)

@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css')}}"> 
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0"></script>
@endsection

@section('contenido')
	<div class="super_container_inner">
		<div class="super_overlay"></div>
 

 
		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
					<br/><br/>
						<div class="section_title text-center">{{$cat->nombre}}</div><br/>
					<div class='text' style=' max-width:800px;width:100%;text-align:center;display:inline-block;'>
					{{$cat->descripcion}}
					</div>
					</div>
					
				</div>
				<br/>
				<div class="row products_row">
					

					@foreach ($productos as $prod)
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image">
							<a href="/producto/{{$prod->slug}}">
								<img src="{{$prod->images[0]->url}}" alt="">
							</a>	
							</div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="/producto/{{$prod->slug}}">{{$prod->nombre}}</a></div>
											
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="product_category"> <a href="/categoria/{{$prod->category->slug}}">{{$prod->category->nombre}}</a></div> 
									</div>
								</div> 
							</div>
						</div>
					</div>
					@endforeach


 



				</div> 
			</div>
		</div>


 

<br>

<br>

<br>

   
		<!-- Features -->

		<div class="features">
			<div class="container">
				<div class="row">
					
					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src="/fuentes/icons/stock.png" alt=""></div>
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
								<div class="feature_icon ml-auto mr-auto"><img src="/fuentes/icons/calidad.png" alt=""></div>
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
								<div class="feature_icon  ml-auto mr-auto"  style='left:-10px;top:-32px!important;'><img src="/fuentes/icons/personal.png" alt=""></div>
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