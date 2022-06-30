<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Posts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking connection to external db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $externalPosts = collect(DB::connection('mysql_extend')->select('SELECT  `post_date`, `post_title`, `post_content`, `post_modified`, `post_status` FROM `wp_posts` WHERE `post_type` = "post" AND `post_status` = "publish"'));
        if ($externalPosts->isNotEmpty()) {
            $externalPosts->each(function ($item) {
                $post = new Posts();

                $post->setAttribute('user_id', 1);
                $post->setAttribute('title', $item->post_title);
                $post->setAttribute('status', $item->post_status);
                $post->setAttribute('content', $item->post_content);
                $post->setCreatedAt($item->post_date);
                $post->setUpdatedAt($item->post_modified);

                $post->save();
            });
        }
    }
}
