<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $post = new Post();

        // Use fake data to pass by the post creation
        // as they aren't required
        $post->title = $request->get('title', fake()->realText(50));
        $post->description = $request->get('description', fake()->realText);

        $post->website()->associate($request->website_id);
        $post->save();

        return $post;
    }
}
