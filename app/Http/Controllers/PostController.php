<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Метод для отображения всех постов
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Метод для отображения формы создания поста
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Метод для сохранения нового поста в базе данных
        $post = Post::create($request->all());

        // Отправка события о создании поста
        event(new PostCreated($post));

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        // Метод для отображения формы редактирования поста
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Метод для обновления поста в базе данных
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Метод для удаления поста из базы данных
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function publish(Post $post)
    {
        // Метод для публикации поста
        $post->update(['published_at' => now()]);
        return redirect()->route('posts.index');
    }

    public function unpublish(Post $post)
    {
        // Метод для снятия с публикации поста
        $post->update(['published_at' => null]);
        return redirect()->route('posts.index');
    }
}

