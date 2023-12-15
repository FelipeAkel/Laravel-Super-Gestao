<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComprovanteVendaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $parametrosEmail;

    public function __construct($parametrosEmail)
    {
        $this->parametrosEmail = $parametrosEmail;
    }

    public function build()
    {
        return $this->view('email.comprovanteVenda');
    }
}
