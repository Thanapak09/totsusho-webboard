@extends('layouts.app')

@section('content')
<a href="{{ route('topics.index') }}" class="btn btn-secondary mb-3">← Back</a>

<form action="{{ route('topics.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Topic Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>

    <input type="hidden" name="created_by" value="anonymous">

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
