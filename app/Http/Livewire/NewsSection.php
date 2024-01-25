<?php

// app/Http/Livewire/NewsSection.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\NewsService;

class NewsSection extends Component
{
    public $category = 'Sports';
    public $newsdata;

    public function render()
    {
        $this->newsdata = app(NewsService::class)->getNews($this->category);

        return view('livewire.news-section');
    }

    public function updatedCategory($value)
    {
        $this->newsdata = app(NewsService::class)->getNews($value);
    }

}



