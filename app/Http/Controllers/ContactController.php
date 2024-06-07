<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\SendMailController;
use Mail;
use App\Mail\TemplateMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'Por favor ingresa un email válido.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.numeric' => 'El teléfono debe ser numérico.',
            'message.required' => 'El campo mensaje es obligatorio.',
            'g-recaptcha-response.required' => 'Por favor, completa la verificación reCAPTCHA.'
        ]);

        $content = [
            'subject' => 'Nuevo contacto desde web',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new TemplateMail($content));

        return redirect('/#contacto')->with(['success' => 'Formulario enviado correctamente']);
    }
}
