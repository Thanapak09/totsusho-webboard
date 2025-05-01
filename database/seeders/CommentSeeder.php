<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Topic;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $topics = Topic::all();

        foreach($topics as $topic){
            Comment::create([
                'topic_id' => $topic->id,
                'content' => 'This is a comment',
                'comment_by' => 'anonymous',
            ]);
        }
    }
}
