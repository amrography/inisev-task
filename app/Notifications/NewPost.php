<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class NewPost extends Notification implements ShouldQueue
{
    use Queueable;
    use InteractsWithQueue;

    public function __construct(public Post $post)
    {
        //
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
                    ->subject("From website: {$this->post->website->name}")
                    ->line($this->post->title)
                    ->line($this->post->description);
    }
}
