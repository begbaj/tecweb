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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
  $this->registerPolicies();

        Gate::define('isAdmin', function ($admin) {
            return $admin->hasRole('admin');
        });

        Gate::define('isLocatario', function ($locatario) {
            return $locatario->hasRole('locatario');
        });

        Gate::define('isLocatore', function ($locatore) {
            return $locatore->hasRole('locatore');
        });        
        
    }
}
