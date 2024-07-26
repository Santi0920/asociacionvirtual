<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoInfo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombrecompleto;
    public $agencia;
    public $director;
    public $direccion;
    public $telefonofijo;
    public $celularcorp;
    public $correo;
    public $id;
    public $fecha;
    public $escribe;

    public function __construct($nombrecompleto, $agencia, $director, $direccion, $telefonofijo, $celularcorp, $correo, $id, $fecha, $escribe)
    {
        $this->nombrecompleto = $nombrecompleto;
        $this->agencia = $agencia;
        $this->director = $director;
        $this->direccion = $direccion;
        $this->telefonofijo = $telefonofijo;
        $this->celularcorp = $celularcorp;
        $this->correo = $correo;
        $this->id = $id;
        $this->fecha = $fecha;
        $this->escribe = $escribe;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '¡Asociación Virtual Exitosa! ',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.enviar-correo',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
