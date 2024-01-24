<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\NewsService;

class NewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NewsService::class, function () {
            return new NewsService();
        });
    }
}


