<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Метод для сохранения нового комментария в базе данных
        $comment = new Comment(['content' => $request->input('content')]);
        $post->comments()->save($comment);

        // Отправка события о создании комментария
        event(new CommentCreated($comment));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        // Метод для удаления комментария из базы данных
        $comment->delete();
        return redirect()->route('posts.show', $post);
    }
}

