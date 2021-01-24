<?php

namespace App\Providers;

use App\Models\Postule;
use App\Models\Profile;
use App\Events\SendMailsEvent;
use App\Observers\PostuleObserve;
use App\Observers\ProfileObserve;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendEmailCandidatListenner;
use App\Listeners\SendEmailOwnerOfOffreListenner;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendMailsEvent::class => [
            SendEmailCandidatListenner::class,
            SendEmailOwnerOfOffreListenner::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Postule::observe(PostuleObserve::class);
        Profile::observe(ProfileObserve::class);
    }
}
