<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class NewsService
{
    public function getNews($category = 'general')
    {
        try {
            $newskey = env('NEWS_API_KEY');
            $publishedAt = Carbon::now()->toDateString();
            $newsApiResponse = Http::get("https://newsapi.org/v2/top-headlines?category=$category&apiKey=$newskey&country=us&publishedAt=$publishedAt");

            if ($newsApiResponse->successful()) {
                return $newsApiResponse->json()['articles'];
            } else {
                // Handle API error.
                throw new \Exception('API request failed');
            }
        } catch (\Exception $e) {
            // Handle exception, log, or provide default news.
            return [];
        }
    }
}


