<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutNavbar extends Component
{
    public array $menu_items;

    public function __construct()
    {
        $this->menu_items = [
            ['label' => 'Welcome', 'route' => 'welcome', 'url' => null,],
            ['label' => 'Posts', 'route' => 'posts.index', 'url' => null,],
            ['label' => 'Categories', 'route' => 'categories.index', 'url' => null,],
            ['label' => 'Authors', 'route' => 'users.index', 'url' => null],
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.site-layout-navbar');
    }
}
