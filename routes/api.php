<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;

// Route::apiResource('posts', PostApiController::class); 
// ^ problem: this will create api/posts route, but it will not be prefixed with /api, 
// so the route will be /posts instead of /api/posts , conflicting wuth the web route.

Route::prefix('api')->name('api.')->group(function () {
    Route::apiResource('posts', PostApiController::class); // at /api/posts
});

/*
api/posts created for external access, json only
 GET|HEAD   api/posts
 POST       api/posts
 GET|HEAD   api/posts/{post}
 PUT|PATCH  api/posts/{post}
 DELETE     api/posts/{post}

eg get all posts json: http://127.0.0.1:8000/api/posts
*/
