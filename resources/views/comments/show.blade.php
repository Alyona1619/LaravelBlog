@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h2>Comments</h2>
        @forelse($approvedComments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <p class="card-text">{{ $comment->content }}</p>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <p>No approved comments yet.</p>
        @endforelse

        <a href="{{ route('posts.index') }}">Back to Posts</a>
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
        <a href="{{ route('comments.create', $post) }}">Leave a Comment</a>
    </div>
@endsection

