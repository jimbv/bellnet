@extends('plantilla.plantilla')

@section('titulo','Metalurgica San Marcos')

@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css')}}"> 
<div id="fb-root"></div>

<link rel="stylesheet" href="/js/fancybox/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />




@endsection


@section('scripts')  
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
                                        <div class="home_title" style='color:#111;' >{{$producto->nombre}}</div>
								<div class="home_subtitle" style='color:#888;'>{{$producto->category->nombre}}</div>
					<br/>
					</div>
					
				</div>
				<br/>
                <div class="container">
                <div class="row">
                <div class="col-sm-8"> 
			    
                <div class="container"></div>
				<div class="row">
				
 


                @foreach ($producto->images as $image)
					<div class="col-xl-4 col-md-6">
						<div class="product">
						
							<div class="product_image">
							<a   href="{{$image->url}}"  data-toggle="modal" data-target="#exampleModalCenter{{$image->id}}">
							<img src="{{$image->url}}" alt="">
							</a>
							</div>
					
						</div>
					</div>


					<div class="modal fade" id="exampleModalCenter{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content" style='width:100%!important;'> 
							
						<div class="modal-body">
						<img src="{{$image->url}}" alt="" >
						</div>
						<button style='position:absolute;top:16px;right:22px;' type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						
						</div>
					</div>
					</div>
					@endforeach 
                </div>
                </div>
                    <div class="col-sm-4"> 
					{!!$producto->descripcion_larga!!}
					</div>
                    </div>
                    </div>
 



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