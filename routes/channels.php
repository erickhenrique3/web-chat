<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// routes/channels.php

Broadcast::channel('chat.{userId}', function () {
    // Permitir que todos se inscrevam no canal
    return true;
});

