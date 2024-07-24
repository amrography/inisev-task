<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeWebsiteRequest;
use App\Models\Website;
use Symfony\Component\HttpFoundation\Response;

class WebsiteController extends Controller
{
    public function subscribe(SubscribeWebsiteRequest $request)
    {
        $website = Website::findOrFail($request->website_id);

        $userAlreadySubscribed = $website->subscribers()
            ->where('user_id', $request->user_id)
            ->exists();

        abort_if(
            $userAlreadySubscribed,
            Response::HTTP_UNPROCESSABLE_ENTITY,
            "User already subscribed!"
        );

        $website->subscribers()->attach($request->user_id);

        return response()->json([
            "message" => "Subscribed successfully!"
        ]);
    }
}
