@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Posts</h1>

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    
                    <h6 class="mt-3">Comments:</h6>
                    @if($post->comments->count() > 0)
                        <ul>
                            @foreach($post->comments as $comment)
                                <li>{{ $comment->content }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No comments yet.</p>
                    @endif
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Show this post</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection


