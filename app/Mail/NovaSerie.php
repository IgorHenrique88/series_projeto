<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeSerie;
    public $qtdTemporadas;
    public $qtdEpisodios;
    public function __construct($nomeSerie, $qtdTemporadas, $qtdEpisodios)
    {
        $this-> nomeSerie = $nomeSerie;
        $this-> qtdTemporadas = $qtdTemporadas;
        $this-> qtdEpisodios = $qtdEpisodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.serie.novSerie');
    }
}
