<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    // 
    public function index()
    {
        $topics = Topic::latest()->withCount('comments')->get();

        Log::info('Viewed topic list');

        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $topic = Topic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'created_by' => auth()->check() ? auth()->user()->name : 'anonymous',
        ]);

        Log::info('Topic created', ['title' => $topic->title, 'by' => $topic->created_by]);

        return redirect()->route('topics.index');
    }

    public function show($id)
    {
        $topic = Topic::with('comments')->findOrFail($id);

        Log::info('Viewed topic detail', ['title' => $topic->title]);

        return view('topics.show', compact('topic'));
    }
}
