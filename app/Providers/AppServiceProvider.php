<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Broadcast::channel('chat_message', function ($user) {
            return Auth::check();
        });
        Schema::defaultStringLength(191);

        // Inertia::share('auth.user', function(){
        //     return Auth::user();
        // });
        Inertia::share([
            'auth.user' => function () {
                return Auth::user();
            },
        ]);
    }
}
