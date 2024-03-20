<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $phimhot = Movie::where(function ($query) {
            $query->where('hot_movie', 1)->orWhere('status', 1);
        })->get();
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $category_home = Category::with('movies')->orderBy('id', 'DESC')->where('status',1)->get();

        return view('pages.home',[
            'title' => 'Home',
            'country' => $country,
            'category_home' => $category_home,
            'category' => $category,
            'phimhot' =>$phimhot,
            'genre' => $genre
        ]);
    }
    public function category($slug){
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $category_slug = Category::where('slug', $slug)->first();
        return view('pages.category',[
            'title' => 'Home',
            'country' => $country,
            'category' => $category,
            'genre' => $genre,
            'category_slug'=>$category_slug,
            'title' => 'category',
        ]);
    }
    public function genre($slug){
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();

        return view('pages.genre',[
            'title' => 'Home',
            'country' => $country,
            'category' => $category,
            'genre' => $genre,
            'genre_slug'=>$genre_slug,

            'title' => 'genre',
        ]);
    }public function country($slug){
        $category = Category::orderBy('id', 'DESC')->where('status',1)->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();

        return view('pages.country',[
            'title' => 'Home',
            'country' => $country,
            'category' => $category,
            'genre' => $genre,
            'country_slug'=>$country_slug,
            'title' => 'country',
        ]);
    }public function movie(){
        return view('pages.movie',[
            'title' => 'movie',
        ]);
    }public function episode(){
        return view('pages.episode',[
            'title' => 'episode',
        ]);
    }
}
