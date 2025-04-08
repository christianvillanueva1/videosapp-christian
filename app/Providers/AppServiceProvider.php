<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('manage-videos', function (User $user) {
            return $user->hasRole('video_manager') || $user->hasRole('super_admin') || $user->hasRole('regular');
        });

        Gate::define('manage-users', function (User $user) {
            return $user->hasRole('super_admin');
        });

        Gate::define('manage-series', function (User $user) {
            return $user->hasRole('super_admin');
        });
    }
}


