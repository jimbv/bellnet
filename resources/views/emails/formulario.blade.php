@extends('plantilla.email')
@section('titulo')
    Mensaje recibido
@endsection
@section('contenido')
	      	<table class="bg_white" role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr style='width:100%;padding:2em;font-weight:bold;'>
                        <td colspan=2  style='border:none;background:transparent;text-align:center;'>
                        <p>Nuevo mensaje desde su sitio web</p>
                        </td>
                    </tr><tr>
					  	<td valign="middle" width="30%" style="text-align:right; padding: 1em;">
                            Asunto
                        </td>
                        <td valign="middle" width="70%" style="text-align:left; padding: 1em;">
                            {{$mensaje_enviar['asunto']}}
                        </td>
                    </tr><tr>
                        <td valign="middle" width="30%" style="text-align:right; padding: 1em;">
                            Remitente
                        </td>
                        <td valign="middle" width="70%" style="text-align:left; padding: 1em;">
                            {{$mensaje_enviar['nombre']}}
                        </td>
                    </tr><tr>
                        <td valign="middle" width="30%" style="text-align:right; padding: 1em;">
                            Localidad
                        </td>
                        <td valign="middle" width="70%" style="text-align:left; padding: 1em;">
                            {{$mensaje_enviar['localidad']}}
                        </td>
                    </tr><tr>
                        <td valign="middle" width="30%" style="text-align:right; padding: 1em;">
                            Email
                        </td>
                        <td valign="middle" width="70%" style="text-align:left; padding: 1em;">
                            <strong><a href="mailto:{{$mensaje_enviar['email']}}">{{$mensaje_enviar['email']}}</a></strong>
                        </td>
                    </tr><tr>
                        <td valign="middle" width="30%" style="text-align:right; padding: 1em 1em;">
                            Teléfono
                        </td>
                        <td valign="middle" width="70%" style="text-align:left; padding:  1em 1em;">
                            <strong><a href="mailto:{{$mensaje_enviar['email']}}">{{$mensaje_enviar['telefono']}}</a></strong>
                        </td>
                     
                    </tr><tr>
                        <td valign="middle" width="100%" style="text-align:left; padding:1em;" colspan=2>
                            <p style='padding:1.3em;'>{{$mensaje_enviar['mensaje']}}</p>
                        </td>
                    </tr><tr>
					  	<td valign="middle" style="text-align:center; padding: 1em 2.5em;" colspan=2>
					  		<p><a href="mailto:{{$mensaje_enviar['email']}}" class="btn btn-primary" style='background:#EB5D1E;'>Responder</a></p>
					  	</td>
					</tr>
	      	</table>
@endsection