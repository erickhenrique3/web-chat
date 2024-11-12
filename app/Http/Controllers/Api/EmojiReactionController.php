<?php

namespace App\Http\Controllers\Api;

use App\Events\EmojiReactionAdded;
use App\Events\EmojiReceived;
use App\Events\EmojiSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmojiReactionController extends Controller
{
    public function rect(Request $request)
    {
        $emoji = $request->input('emoji');
        $userId = $request->user()->id;
        // $emoji = '🔥';
        // $userId = 1; 

        event(new EmojiReactionAdded($emoji, $userId));
        // Log::info('EmojiReactionAdded event enviado');
        return response()->json([
            'emoji' => $emoji,
            'usuario' =>  $userId,
            'status' => 'reaction sent'
        ]);
    }
}
