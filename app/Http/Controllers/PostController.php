<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Events\PostCreated;
use App\Events\PostUpdated;
use App\Events\PostDeleted;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::with('comments')
        ->where(function ($query) {
            $query->whereNull('publish_at')
                ->orWhere('publish_at', '<=', now());
        })
        ->where('published', true) 
        ->get();

    return view('posts.index', compact('posts'));
}

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'publish_at' => 'nullable|date',
        ]);

        $post = Post::create($request->all());

        event(new PostCreated($post));

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $approvedComments = $post->comments()->where('status', 'approved')->get();
        return view('posts.show', compact('post', 'approvedComments'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'publish_at' => 'nullable|date',
        ]);

        $post->update($request->all());
        event(new PostUpdated($post));
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        event(new PostDeleted($post));
        return redirect()->route('posts.index');
    }

    public function publish(Post $post)
    {
        if ($post->publish_at === null || $post->publish_at <= now()) {
            $post->update(['publish_at' => now(), 'published' => true]);
            return redirect()->route('posts.show', $post);
        } else {
            return redirect()->route('posts.show', $post)->with('error', 'Нельзя опубликовать пост до указанной даты и времени.');
        }
    }

    public function unpublish(Post $post)
    {
        $post->update(['publish_at' => null]);
        return redirect()->route('posts.show', $post);
    }
}
