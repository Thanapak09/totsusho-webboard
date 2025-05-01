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
            'user_id' => auth()->id(),
            'comment_by' => auth()->check() ? auth()->user()->name : 'anonymous',
        ]);

        Log::info('Comment added', ['topic_id' => $topicId, 'by' => $comment->comment_by]);

        return back();
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        Log::info('Comment deleted', ['comment_id' => $id, 'by' => auth()->user()->name ?? 'anonymous']);

        return back();
    }
}
