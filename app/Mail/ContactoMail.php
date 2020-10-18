<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Mensaje desde Web';
    public $mensaje_enviar;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje_enviar)
    {
        $this->mensaje_enviar = $mensaje_enviar; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->view('emails.formulario');
    }
}
