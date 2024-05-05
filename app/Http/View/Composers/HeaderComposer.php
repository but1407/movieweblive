<?php

namespace App\Http\View\Composers;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Category;
use Illuminate\View\View;

class HeaderComposer
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
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        
        $view->with([
            'country' => $country,
            'category' => $category,
            'genre' => $genre
        ]);
    }
}