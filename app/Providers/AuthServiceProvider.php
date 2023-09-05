<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

use App\Models\Role;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // $this->registerPolicies();


        // if (!$this->app > routesAreCached()) {
        //     Passport::routes();
        // }

        try {
            // all auth user role gates

            // all auth user permission gates
        } catch (\Exception $event) {
            return $event;
        }
    }
}
