<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        /*
        if($post->published_at === null) {
            abort(403, 'This post is not published yet.');
        }*/

        return view('posts.show', [
            'post' => $post
        ]);
    }

}
