<?php

namespace App\Mail;

use App\Models\Offre;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OffreCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $offre;

    public function __construct(Offre $offre){
        $this->offre=$offre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Vous avez créer une nouvelle offre")
                    ->markdown('emails.users.OffreCreated');
    }
}
