@extends('layouts.app')

@section('content')
<a href="{{ route('topics.index') }}" class="btn btn-secondary mb-3">← Back to Topics</a>

<h3>{{ $topic->title }}</h3>
<p class="mb-4">{{ $topic->content }}</p>

<h5>Comments ({{ $topic->comments->count() }})</h5>

@forelse ($topic->comments as $comment)
    <div class="border p-3 mb-3 rounded bg-light">
        <strong>{{ $comment->comment_by ?? 'anonymous' }}</strong>
        <span class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</span>
        <p>{{ $comment->content }}</p>
    </div>
@empty
    <p>No comments yet.</p>
@endforelse

<hr>

<h5>Add Comment</h5>

<form action="{{ route('comments.store', $topic->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="form-control" rows="3" placeholder="Write comment..." required></textarea>
    </div>

    <input type="hidden" name="comment_by" value="anonymous">

    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>
@endsection
