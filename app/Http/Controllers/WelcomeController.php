<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;



use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function welcome()
    {
        if(request()->has('referrer_id')) {
            session()->flash('referrer', User::find(request()->referrer_id)->name);
        }

        $recent_news = Cache::remember('welcome.recent_news', config('app.cache_ttl'), function() {
            return Post::isPublished()->with(['media', 'categories', 'author'])->orderBy('published_at', 'desc')->take(4)->get();
        });

        $authors = Cache::remember('welcome.authors', config('app.cache_ttl'), function() {
            return User::select(['name'])->with('posts')->get();
        });

        $newsdata = $this->getNewsData();

    return view('welcome', compact('recent_news', 'authors','newsdata'));
    }




    private function getNewsData()
    {
        try {
            $newskey = env('NEWS_API_KEY');
            $newsApiResponse = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $newskey);

            if ($newsApiResponse->successful()) {
                return $newsApiResponse->json()['articles'];
            } else {
                // Handle API error
                throw new \Exception('API request failed');
            }
        } catch (\Exception $e) {
            // Handle exception, log, or provide default news
            return [];
        }
    }


}
