<?php

use Illuminate\Support\Facades\Route;

// Роут для вещания события post.created
use App\Events\PostCreated;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('post.created', function () {
    return true;
});

Route::get('/', function () {
    return view('welcome');
});
