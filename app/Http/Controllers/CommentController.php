<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    //
    public function store(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'topic_id' => $topicId,
            'content' => $request->content,
            'comment_by' => $request->input('comment_by', 'anonymous'),
        ]);

        Log::info('Comment added', ['topic_id' => $topicId, 'by' => $comment->comment_by]);

        return back();
    }
}
