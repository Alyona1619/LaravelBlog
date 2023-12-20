@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="publish_at">Publish Date and Time (optional):</label>
                <input type="datetime-local" name="publish_at" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection

