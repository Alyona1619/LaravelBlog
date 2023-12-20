
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Leave a Comment</h1>

        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Comment:</label>
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>

        <a href="{{ route('posts.show', $post) }}">Back to Post</a>
    </div>
@endsection
