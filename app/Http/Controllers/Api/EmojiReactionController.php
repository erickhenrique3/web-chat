<?php

namespace App\Http\Controllers\Api;

use App\Events\EmojiReactionAdded;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmojiReactionController extends Controller
{
    public function rect(Request $request)
    {
        // $emoji = $request->input('emoji');
        // $userId = $request->user()->id;
        $emoji = '🔥';
        $userId = 1; 

        broadcast(new EmojiReactionAdded($emoji, $userId))->toOthers();

        return response()->json([
            'status' => 'reaction sent'
        ]);
    }
}
