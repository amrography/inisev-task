<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPost;
use Illuminate\Console\Command;

class SendPostsToSubscribers extends Command
{
    protected $signature = 'app:send-posts-to-subscribers';

    protected $description = 'Send email to the subscribers';

    public function handle()
    {
        $posts = Post::with('website.subscribers')
            ->get();

        $posts->each(function (Post $post) {
            // todo: we need to check subscriber is already got the post mail or not
            $post->website->subscribers->each(function (User $user) use ($post) {
                $user->notify(new NewPost($post));
            });
        });

        return self::SUCCESS;
    }
}