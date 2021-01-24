<?php

namespace App\Listeners;

use App\Mail\CandidatEmail;
use App\Events\SendMailsEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailCandidatListenner implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  SendMailsEvent  $event
     * @return void
     */
    public function handle(SendMailsEvent $event)
    {
        Mail::to($event->user->email)
            ->queue(new CandidatEmail($event->user, $event->postule));
    }
}
