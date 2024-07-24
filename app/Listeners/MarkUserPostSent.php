<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationSent;

class MarkUserPostSent
{
    public function handle(NotificationSent $event): void
    {
        $event->notifiable
            ->sentPosts()
            ->attach($event->notification->post);
    }
}
