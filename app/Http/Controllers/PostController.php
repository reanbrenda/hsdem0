<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with(['author', 'categories'])
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
         /*
        if($post->published_at === null) {
            abort(403, 'This post is not published yet.');
        }*/

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
