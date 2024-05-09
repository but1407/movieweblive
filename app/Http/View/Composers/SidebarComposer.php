<?php

namespace App\Http\View\Composers;

use App\Models\Movie;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $phimhotle_sidebar = Movie::where([
            ['hot_movie', 1],
            ['status', 1],
            ['thuocphim', 0],
        ])->orderBy('updated_at','DESC')->take(10)->get();
        $phimhotbo_sidebar = Movie::where([
            ['hot_movie', 1],
            ['status', 1],
            ['thuocphim', 1],
        ])->take(10)->get();
        
        $view->with([
            'phimlehot' => $phimhotle_sidebar,
            'phimbohot' => $phimhotbo_sidebar,
        ]);
    }
}