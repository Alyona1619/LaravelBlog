<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class PublishScheduledPosts extends Command
{
    protected $signature = 'posts:publish-scheduled';
    protected $description = 'Publish scheduled posts';

    public function handle()
    {
        $this->info('Checking and publishing scheduled posts...');

        $posts = Post::where('published', false)
                     ->where('publish_at', '<=', now())
                     ->get();

        foreach ($posts as $post) {
            $post->update(['published' => true]);
            $this->info("Post '{$post->title}' published at {$post->publish_at}");
        }

        $this->info('Scheduled posts published successfully.');
    }
}



