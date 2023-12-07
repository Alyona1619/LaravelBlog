<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon\Carbon;

class PublishPosts extends Command
{
    protected $signature = 'publish:posts';
    protected $description = 'Publish posts automatically based on scheduled time';

    public function handle()
    {
        $posts = Post::where('publish_at', null)->where('scheduled_publish_at', '<=', now())->get();

        foreach ($posts as $post) {
            $post->update(['publish_at' => now()]);
            $this->info("Post ID {$post->id} has been published.");
        }

        $this->info('Publishing completed.');
    }
}

