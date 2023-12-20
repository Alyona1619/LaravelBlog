
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Comments</h1>

        @foreach($comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <p class="card-text">{{ $comment->content }}</p>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>

                    @if($comment->status == 'pending')
                        <form action="{{ route('comments.approve', $comment) }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('comments.reject', $comment) }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection




