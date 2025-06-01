<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Gunung;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        
        Gate::define("view-gunungs", function (User $user) {
            if ($user->role === "admin" || $user->role === "user") {
                return true;
            }
            return false;
        });

        Gate::define("store-gunungs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });

        Gate::define("edit-gunungs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });

        Gate::define("destroy-gunungs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });

        Gate::define("view-jalurs", function (User $user) {
            if ($user->role === "admin" || $user->role === "user") {
                return true;
            }
            return false;
        });
        Gate::define("store-jalurs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
        Gate::define("edit-jalurs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
        Gate::define("destroy-jalurs", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
        Gate::define("view-jadwal-pendakians", function (User $user) {
            if ($user->role === "admin" || $user->role === "user") {
                return true;
            }
            return false;
        });
        Gate::define("store-jadwal-pendakians", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
        Gate::define("edit-jadwal-pendakians", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
        Gate::define("destroy-jadwal-pendakians", function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
    }
}
