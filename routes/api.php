<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::apiResource('post', PostController::class)->only('store');
Route::post('website/subscribe', [WebsiteController::class, 'subscribe']);
