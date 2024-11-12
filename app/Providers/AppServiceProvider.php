<?php

namespace App\Providers;

use App\Events\EmojiReactionAdded;
use App\Listeners\EmojiReactionListener;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Event;
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
        // Broadcast::channel('chat_message', function ($user) {
        //     return Auth::check();
        // });
        Broadcast::channel('emoji-reactions', function ($user, $id) {
            return true; 
        });
        Schema::defaultStringLength(191);

        // // Registrar o evento e listener diretamente aqui
        // Event::listen(
        //     EmojiReactionAdded::class,
        //     EmojiReactionListener::class
        // );

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
