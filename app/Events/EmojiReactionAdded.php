<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmojiReactionAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $emoji;
    public $userId;

    /**
     * Create a new event instance.
     */
    public function __construct($emoji, $userId)
    {
        $this->emoji = $emoji;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('emoji-reactions');
    }

    // public function broadcastAs()
    // {
    //     return 'EmojiReactionAdded';
    // }

    public function broadcastWith()
    {
        return [
            'emoji' => $this->emoji,
            'userId' => $this->userId,
        ];
    }
}
