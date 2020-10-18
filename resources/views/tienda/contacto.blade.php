@extends('plantilla.plantilla')

@section('titulo','Metalurgica San Marcos')

@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/styles/responsive.css')}}"> 
<script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIleHBqVCu8M2N5BvHUeyst7bBXoBmeow&callback=initializeMap"></script>
@endsection

@section('contenido')
	<div class="super_container_inner">
		<div class="super_overlay"></div>






        <br/><br/><br/><br/><br/><br/><br/>
<div class="lomasvendidocontenedor">
	<div class="section_title text-center">CONTACTO</div>	
	<br> 	  
</div>




<!--Section: Contact v.2-->
<section class="mb-4">
</section>
<section class="mb-4">

<!--Section heading-->
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">Para consultas puede completar el formulario o utilizar cualquiera de nuestros medios de contacto</p>

<div class="row">

	<!--Grid column-->
	<div class="col-md-2 "></div>
	<div class="col-md-5 mb-md-0 mb-5">
		
<form id="contact-form"  action="{{ route('Contacto') }}" method='POST'>
		@csrf
        @method('POST')
			<!--Grid row-->
			<div class="row">
			<div class="col-md-12">

			@if($errors->any())

			<br/><div style='color:red;'>No se pudo enviar el formulario, por favor revise los errores.</div><br/>
			
			@endif
			 
			 {!!$resultado!!}
				</div>
				<!--Grid column-->
				<div class="col-md-6">
					<div class="md-form mb-0">
						<input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
						<label for="name" class="">Nombre y Apellido</label>
						{!!$errors->first('nombre','<br/><div style="color:red;">:message</div><br/>')!!}
					</div>
				</div>&nbsp;
				<br/>
				<!--Grid column-->
				<!--Grid column-->
				<div class="col-md-6">
					<div class="md-form mb-0">
						<input type="text" id="localidad" name="localidad" class="form-control" value="{{old('localidad')}}">
						<label for="name" class="">Localidad</label>
					</div>
				</div>&nbsp;
				<!--Grid column-->
				<br/>
				<!--Grid column-->
				<div class="col-md-6">
					<div class="md-form mb-0">
						<input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
						<label for="email" class="">Correo electrónico</label>
						{!!$errors->first('email','<br/><div style="color:red;">:message</div><br/>')!!}
					</div>
				</div>&nbsp;
				<!--Grid column-->
				<br/>
				<!--Grid column-->
				<div class="col-md-6">
					<div class="md-form mb-0">
						<input type="text" id="telefono" name="telefono" class="form-control" value="{{old('telefono')}}">
						<label for="email" class="">Teléfono</label>
						{!!$errors->first('telefono','<br/><div style="color:red;">:message</div><br/>')!!}
					</div>
				</div>
				<!--Grid column-->

			</div>&nbsp;
			<!--Grid row-->
			<br/>
			<!--Grid row-->
			<div class="row">
				<div class="col-md-6">
					<div class="md-form mb-0">
						<input type="text" id="asunto" name="asunto" class="form-control" value="{{old('asunto')}}">
						<label for="subject" class="">Asunto</label>
						{!!$errors->first('asunto','<br/><div style="color:red;">:message</div><br/>')!!}
					</div>
				</div>
			</div>
			<!--Grid row-->
			<br/>
			<!--Grid row-->
			<div class="row">

				<!--Grid column-->
				<div class="col-md-12">

					<div class="md-form">
						<textarea type="text" id="mensaje" name="mensaje" rows="2" class="form-control md-textarea">{{old('mensaje')}}</textarea>
						<label for="message">Mensaje</label>
						{!!$errors->first('mensaje','<br/><div style="color:red;">:message</div><br/>')!!}
						<br/><br/><br/>
						<script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="g-recaptcha" data-sitekey="6Lej81kUAAAAAF6lPIYkCOguEn8AIW3LtgZkrzgV" style="margin-bottom:10px;"></div>
                            <br/>
					</div>

				</div>

				
			</div>
			<!--Grid row-->

		</form>

		<div class="text-center text-md-left">
			<a class="btn btn-primary" style='color:white;font-weight:bold;' onclick="document.getElementById('contact-form').submit();">Enviar</a>
		</div>
		<div class="status"></div>
	</div>
	<!--Grid column-->

	<!--Grid column-->
	<div class="col-md-3 text-center">
		<ul class="list-unstyled mb-0">
			<li><i class="fa fa-map-marker fa-2x"></i>
				<p>Independencia y Corrientes<br/>
(2566) San Marcos Sud<br/>
Pcia. de Córdoba - República Argentina </p>
			</li>

			<li><i class="fa fa-phone mt-4 fa-2x"></i>
				<p>03537 498253 / 03537 498521</p>
			</li>

			<li><i class="fa fa-envelope mt-4 fa-2x"></i>
				<p><a href='mailto:info@metalurgicasm.com.ar'>info@metalurgicasm.com.ar</a></p>
				<p><a href='mailto:metalurgicasm@hotmail.com'>metalurgicasm@hotmail.com</a></p>
			</li>
		</ul>
	</div>
	<!--Grid column-->

</div>

<div class="col-md-2 "></div>
</section>
<!--Section: Contact v.2-->
        </form>



<br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13440.444019665207!2d-62.490280415602186!3d-32.62986724626504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95cbe0cd05a085b9%3A0xba6c151dac5777eb!2sSan%20Marcos%2C%20C%C3%B3rdoba!5e0!3m2!1ses-419!2sar!4v1589579284970!5m2!1ses-419!2sar" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<br>

<br>


<?php
                        if(isset($_POST["enviado"])!="ok"){
                        ?>
                        <div style='text-align:center;position:relative;top:-600px;width:100%;display:none;'>
                            <div style='text-align:left;display:inline-block;background: #F7E30F;
padding: 20px;
border-radius: 10px;
box-shadow: 0px 0px 2px black'>
                            <form class="form" action="index.php#contact" method="POST">
							<input class="name" name="nombre" type="text" placeholder="Nombre" style='padding:4px;border-radius:3px;'><br/><br/>
							<input class="email" name="email" type="email" placeholder="Email" style='padding:4px;border-radius:3px;'><br/><br/>
							<input class="phone" name="phone" type="text" placeholder="Teléfono" style='padding:4px;border-radius:3px;'><br/><br/>
							<textarea style='padding:4px;border-radius:3px;' class="message" name="message" id="message" cols="30" rows="5" placeholder="Mensaje"></textarea>
                            <br/><br/>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="g-recaptcha" data-sitekey="6Lej81kUAAAAAF6lPIYkCOguEn8AIW3LtgZkrzgV" style="margin-bottom:10px;"></div>
                            <br/>
                            <input type="hidden" name="enviado" id="enviado" value="ok">
                            <input class="submit-btn" style='padding:10px;background:black;color:white;fint;weight:bold;' type="submit" value="ENVIAR">
                        </form>
                        </div>
                        </div>
                        <?php
                    }else{
                            // Enviar MAIL
                            $email = $_POST["email"];
                            $nombre = $_POST["nombre"];
                            $telefono = $_POST["phone"];
                            $mensaje = "Nuevo mensaje de: ".$nombre."
                            <br />Email: ".$email."
                            <br />Teléfono: ".$telefono."
                            <br /><p></p><i> ".$_POST["message"]."</i>
                            ";



                            $recaptcha = $_POST["g-recaptcha-response"];

                        	$url = 'https://www.google.com/recaptcha/api/siteverify';
                        	$data = array(
                        		'secret' => '6Lej81kUAAAAAD5t_yVOOS8FMd7ns8LWbDV8pRC_',
                        		'response' => $recaptcha
                        	);
                        	$options = array(
                        		'http' => array (
                        			'method' => 'POST',
                        			'content' => http_build_query($data)
                        		)
                        	);
                        	$context  = stream_context_create($options);
                        	$verify = file_get_contents($url, false, $context);
                        	$captcha_success = json_decode($verify);
                        	if ($captcha_success->success) {
                        		// No eres un robot, continuamos con el envío del email
                        		$cuerpo = file_get_contents("plantilla_email.html");
                                $cuerpo = str_replace("{email}"," ",$cuerpo);
                                $cuerpo = str_replace("{label_hola}","Mensaje desde www.ammasalud.com.ar ",$cuerpo);
                                $cuerpo = str_replace("{label_parrafo_2}",$mensaje,$cuerpo) ;
                                $cuerpo = str_replace("{label_parrafo_detalle}"," ",$cuerpo);



include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = '192.168.0.12';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'info@metalurgicasm.com.ar';
//Password to use for SMTP authentication
$mail->Password = 'n0Ti,h3Lp.';
//Set who the message is to be sent from
$mail->setFrom('info@metalurgicasm.com.ar', 'Metalurgica San Marcos');
//Set an alternative reply-to address
$mail->addReplyTo('info@metalurgicasm.com.ar', 'Metalurgica San Marcos');
//Set who the message is to be sent to
$mail->addAddress('info@metalurgicasm.com.ar', 'San Marcos');
//Set the subject line
$mail->Subject = 'Mensaje desde Web';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($cuerpo, __DIR__);

                            if($mail->send()){
                                echo("<br /><div style='color:white;'> Gracias por haberse puesto en contacto. <br /> Responderemos a su consulta a la brevedad.</div>");
                            }else{
                                echo("<br /><div style='color:red;'> No ha podido enviarse el email. Disculpe las molestias.</div>");
                            }
                        }else{
                                echo("<br /><div style='color:yellow;'> No ha pasado la prueba de seguridad, por favor volver a intentar.</div>");
                            }
                }
                ?>



 
		
		<br>

 
		<br>
		
		<br>
		
		<br>


		<!-- Boxes -->

		<div class="boxes">
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
											<a href="/categoria/tanques-cilindricos">
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
											<a href="/categoria/semiremolques">
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
											<a href="/categoria/sobre-camion">
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

@endsection