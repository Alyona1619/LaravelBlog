<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

use App\Events\CommentCreated;
use App\Events\CommentDeleted;
use App\Events\CommentModerated;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['status' => 'approved']);
        event(new CommentModerated($comment));
        return redirect()->route('comments.index');
    }

    public function reject(Comment $comment)
    {
        $comment->update(['status' => 'rejected']);
        event(new CommentModerated($comment));
        return redirect()->route('comments.index');
    }

    public function moderate(Comment $comment, $status)
    {
        $comment->update(['status' => $status]);

        event(new CommentModerated($comment));

        return redirect()->route('comments.index');
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $post->comments()->create([
            'content' => $request->input('content'),
        ]);

        event(new CommentCreated($comment));

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        event(new CommentDeleted($comment));

        return redirect()->route('posts.show', $post);
    }
}

