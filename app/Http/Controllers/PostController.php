<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<>', null)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
