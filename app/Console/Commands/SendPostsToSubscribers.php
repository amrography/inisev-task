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
        $posts = Post::with(['website.subscribers'])
            ->get();

        $posts->each(function (Post $post) {
            $post->website->subscribers->each(function (User $user) use ($post) {
                if ($user->sentPosts()->wherePivot('post_id', $post->id)->exists()) {
                    return;
                }

                $user->notify(new NewPost($post));
                $this->info("Sending postId: {$post->id} to userId: {$user->id}");
            });
        });

        return self::SUCCESS;
    }
}
