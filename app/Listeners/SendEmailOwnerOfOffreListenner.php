<?php

namespace App\Listeners;

use App\Events\SendMailsEvent;
use App\Mail\OwnerOffreEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailOwnerOfOffreListenner implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  SendMailsEvent  $event
     * @return void
     */
    public function handle(SendMailsEvent $event)
    {
        Mail::to($event->postule->offre->user->email)
            ->queue(new OwnerOffreEmail($event->postule));
    }
}
