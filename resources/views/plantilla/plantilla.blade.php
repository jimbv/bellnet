<!DOCTYPE html>	
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>@yield('titulo')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Metalúrgica San Marcos">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">

 

<link rel="stylesheet" type="text/css" href="{{ asset('asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">

@yield('estilos')

</head>
<body>

<!-- Menu -->
<div id="app">
	<div class="menu">

	<div class="hamburger" style='position:absolute;top: 15px !important;left: 0px !important;' ><i class="fa fa-bars" aria-hidden="true"></i></div>
		<!-- Search -->
		<div>
			<a href='/'><img src='/fuentes/titulo.png'  style='max-width:300px;width:100%;'> </a>
		</div>

		<br/>
		<!-- Navigation -->
		<div class="menu_nav">
			<ul>
				<li><a href="/empresa">La empresa</a></li>
				<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Nuestros Productos
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						@foreach ($categorias as $categoria)
							<li><a tabindex="-1" href="/categoria/{{$categoria->slug}}" style="margin: 13px;
							position: relative;
							display: inline-block;
							margin-bottom: 10px;">{{$categoria->nombre}}</a></li> 
						@endforeach 
				</ul>
				</li>
				<li><a href="/contacto">Contacto</a></li>
				
			</ul>
		</div>
		<!-- Contact Info -->
		<div class="menu_contact">
			<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
				<div><div><img src="/asset/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
				<div>03537 498253 /   03537 498521</div>
			</div>
			<div class="menu_phone d-flex flex-row align-items-center justify-content-start"> 
				
				<div><br/><br/><a href='mailto:info@metalurgicasm.com.ar'>info@metalurgicasm.com.ar</a> <br/>
			 <a href='mailto:metalurgicasm@hotmail.com'>metalurgicasm@hotmail.com</a> </div>
			</div>
			<div class="menu_social">
				<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
					<li><a href="https://www.facebook.com/250425142568697/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
					<li><a href="https://www.instagram.com/metalurgica_san_marcos/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="https://wa.me/5493537303217"><i class="fa fa-whatsapp"></i></i></a></li>
				</ul>
				<br/>
				 
			</div>
		</div>
	</div>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_overlay"></div>
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
			
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<div class="logo">
					<a href="/">
						<div class="d-flex flex-row align-items-center justify-content-start">
							<div></div>
							<div><img src="/fuentes/titulo.png" alt="Industria Metalúrgica San Marcos"  style='max-width:300px;width:100%;'></div>
						</div>
					</a>	
				</div>
				<nav class="main_nav">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li class="active"><a href="/empresa">La empresa</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Nuestros Productos
						<b class="caret"></b>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
						@foreach ($categorias as $categoria)
							<li><a tabindex="-1" href="/categoria/{{$categoria->slug}}" style="margin: 13px;
							position: relative;
							display: inline-block;
							margin-bottom: 10px;">{{$categoria->nombre}}</a></li> 
						@endforeach 
						</ul>
						</li>
						<li><a href="/contacto">Contacto</a></li>					
					</ul>
				</nav>
				<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
					 
					<div class="header_phone d-flex flex-row align-items-center justify-content-start">
						<div><div><img src="/asset/images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
						<div>03537 498253 /   03537 498521</div>
					</div>
				</div>
			</div>
		</header>

	@yield('contenido')

			<!-- Footer -->

			<footer class="footer">
				<div class="footer_content">
					<div class="container">
						<div class="row">
							
							<!-- About -->
							<div class="col-lg-4 footer_col">
								<div class="footer_about">
									<div class="footer_logo">
										<a href="/">
											<div class="d-flex flex-row align-items-center justify-content-start">
												<div class="footer_logo_icon"><img src="/fuentes/titulo.png" style='max-width:90%'></div> 
											</div>
										</a>		
									</div>
									<div class="footer_about_text">
										<p> 

Independencia y Corrientes<br/>
(2566) San Marcos Sud<br/>
Pcia. de Córdoba - República Argentina </p>
									</div>
								</div>
							</div>

							<!-- Footer Links -->
							<div class="col-lg-4 footer_col">
								<div class="footer_menu"> 
									<ul class="footer_list"> 
										<li>
											<a href="mailto:info@metalurgicasm.com.ar"><div>info@metalurgicasm.com.ar</div></a>
										</li>
										<li>
											<a href="mailto:metalurgicasm@hotmail.com"><div>metalurgicasm@hotmail.com</div></a>
										</li>
									</ul>
								</div>
							</div>

							<!-- Footer Contact -->
							<div class="col-lg-4 footer_col">
								<div class="footer_contact">
									 
									<div class="footer_social">
										<div class="footer_title">Redes Sociales</div>
										<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
											<li><a href="https://www.facebook.com/250425142568697/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="https://www.instagram.com/metalurgica_san_marcos/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="https://wa.me/5493537303217"><i class="fa fa-whatsapp"></i></i></a></li>


											
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer_bar">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
									<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> Metalúrgica San Marcos - DD Sistemas
	<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
									<nav class="footer_nav ml-md-auto order-md-2 order-1">
										<ul class="d-flex flex-row align-items-center justify-content-start">
										<li class="active"><a href="/empresa">La empresa</a></li>
										<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Nuestros Productos
										<b class="caret"></b>
										</a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
											
											@foreach ($categorias as $categoria)
												<li><a tabindex="-1" href="/categoria/{{$categoria->slug}}" style="margin: 13px;
												position: relative;
												display: inline-block;
												margin-bottom: 10px;">{{$categoria->nombre}}</a></li> 
											
											@endforeach
										</ul>
										</li>
										<li><a href="/contacto">Contacto</a></li>	
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
			
	</div>
</div>

</body>
<script src="{{ asset('asset/js/jquery-3.2.1.min.js')}}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script> 
<script src="{{ asset('js/all.js') }}" defer></script>


@yield('scripts')
</html>