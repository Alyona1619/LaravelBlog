<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::post('/posts/{post}/unpublish', [PostController::class, 'unpublish'])->name('posts.unpublish');
Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::put('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
Route::put('/comments/{comment}/reject', [CommentController::class, 'reject'])->name('comments.reject');