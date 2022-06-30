<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Posts;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Posts/Index', [
            'posts' => Posts::query()
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->paginate(20)
                ->withQueryString(),
        ]);
    }

    public function create() : \Inertia\Response
    {
        return Inertia::render('Posts/Create');
    }

    public function edit(Posts $post) : \Inertia\Response
    {
        return Inertia::render('Posts/Edit', [
            'post' => [
                'id' => $post->getAttribute('id'),
                'title' => $post->getAttribute('title'),
                'content' => $post->getAttribute('content'),
            ],
        ]);
    }
}
