@extends('layouts.app')

@section('content')
<a href="{{ route('topics.create') }}" class="btn btn-success mb-3">➕ New Topic</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Topic</th>
            <th>Comments</th>
            <th>Last Comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td><a href="{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a></td>
                <td>{{ $topic->comments_count }}</td>
                <td>{{ optional($topic->comments->last())->created_at->format('d M Y') ?? 'No comment' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
