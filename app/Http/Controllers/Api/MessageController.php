<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function listMessages(User $user){
      $userFrom = Auth::user()->id;
      $userTo = $user->id;

    //   [from = $userFrom && to = $userTo]
    //   Ou  [from = $userTo && to = $userFrom]
      $messages = Message::where(
        function($query) use ($userFrom, $userTo){
            $query->where([
                'from' => $userFrom,
                'to' => $userTo
            ]);
        }
      )->orWhere(
        function($query) use ($userFrom, $userTo){
            $query->where([
                'from' => $userTo,
                'to' => $userFrom
            ]);
        }
      )->orderBy('created_at', 'ASC')->get();

      return response()->json([
        'messages' => $messages
      ],200);
    }
    
    //   }
      public function store(Request $request) {
        $message = new Message();
        $message->from = Auth::user()->id;
        $message->to = $request->to;
        $message->content = filter_var($request->content, FILTER_SANITIZE_STRING);
        $message->save();
        Log::info('Event MessageSent:', ['message' => $message]);

        event(new MessageSent($message));
        return response()->json([
          'message' => $message
      ], 201);
    
    }
    
}
