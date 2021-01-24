<?php

namespace App\Mail;

use App\Models\Postule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OwnerOffreEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $postule;

    public function __construct(Postule $postule)
    {
        $this->postule = $postule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Un nouveau candidat postulez à votre offre")
                    ->markdown('emails.candidat.OwnerOffre');
    }
}
