<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;


class EnviarCodigoConfirmacao extends Mailable
{
    use Queueable, SerializesModels;


    private $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->usuario->email)
        ->subject('Email de Confirmação do Site de Leilão!')
        ->view('emails.confirmacao')->with('usuario', $this->usuario);
    }
}
