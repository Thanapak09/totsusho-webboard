<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'content',
        'comment_by',
    ];

    /**
     * Get the topic that owns the comment.
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
