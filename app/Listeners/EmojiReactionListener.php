<?php

namespace App\Listeners;

use App\Events\EmojiReactionAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class EmojiReactionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmojiReactionAdded $event)
    {
        // Acesse o evento para realizar ações com os dados
        $emoji = $event->emoji;
        $userId = $event->userId;

        // Aqui você pode processar o emoji ou realizar qualquer ação desejada
        Log::info('Emoji recebido:', ['emoji' => $emoji, 'user_id' => $userId]);
    }
}
