<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Postule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CandidatEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $postule;

    public function __construct(User $user, Postule $postule)
    {
        $this->user    = $user;
        $this->postule = $postule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Vous avez postuler à une offre")
                    ->markdown('emails.candidat.Postule');
    }
}
