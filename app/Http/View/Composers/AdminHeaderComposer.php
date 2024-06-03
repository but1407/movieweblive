<?php

namespace App\Http\View\Composers;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\View\View;

class AdminHeaderComposer
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
        $total_category = Category::all()->count();
        $total_country = Country::all()->count();
        $total_genre = Genre::all()->count();
        $total_movie = Movie::all()->count();
        
        $view->with([
            'total_category' => $total_category,
            'total_country' => $total_country,
            'total_genre' => $total_genre,
            'total_movie' => $total_movie,
        ]);
    }
}