<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Offre'    => 'App\Policies\OffrePolicy',
        'App\Models\User'     => 'App\Policies\UserPolicy',
        'App\Models\Demande'  => 'App\Policies\DemandePolicy',
        'App\Models\Postule'  => 'App\Policies\PostulePolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
