<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;

class SendPostNotificationToClient implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(PostCreated $event)
    {
        // Отправка события на клиентскую сторону
        Broadcast::event('post.created', ['post' => $event->post]);
    }
}