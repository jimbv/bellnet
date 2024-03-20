<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TemplateMail;

class SendMailController extends Controller
{
    public function index()
    {
    }

    public static function contact(string $bodyMessage='')
    {
        $content = [
            'subject' => 'Nuevo contacto desde web',
            'body' => $bodyMessage
        ];

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new TemplateMail($content));

        return "Email enviado";
    }
}