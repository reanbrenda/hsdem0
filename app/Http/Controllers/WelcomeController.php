<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\User;
use App\Services\NewsService;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller

{

    private $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function welcome()
    {
        if (request()->has('referrer_id')) {
            session()->flash('referrer', User::find(request()->referrer_id)->name);
        }

        $recent_news = Cache::remember('welcome.recent_news', config('app.cache_ttl'), function () {
            return Post::isPublished()->with(['media', 'categories', 'author'])->orderBy('published_at', 'desc')->take(4)->get();
        });

        $authors = Cache::remember('welcome.authors', config('app.cache_ttl'), function () {
            return User::select(['name'])->with('posts')->get();
        });
        $category = request()->input('category', 'general');
        $newsdata = $this->newsService->getNews($category);

        return view('welcome', compact('recent_news', 'authors', 'newsdata'));
    }


}






