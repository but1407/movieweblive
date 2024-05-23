<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\View\View;

class FooterComposer
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
        $countries = Country::where([
            
            ['status', 1],
        ])->orderBy('updated_at','DESC')->take(5)->get();
        $categories = Category::where([
            ['status', 1],
        ])->take(5)->get();
        
        $view->with([
            'countries' => $countries,
            'categories' => $categories,
        ]);
    }
}