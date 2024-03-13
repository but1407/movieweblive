<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $category = Category::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'DESC')->get();

        return view('pages.home',[
            'title' => 'Home',
            'country' => $country,
            'category' => $category,
            'genre' => $genre
        ]);
    }
    public function category($slug){
        return view('pages.category',[
            'title' => 'category',
        ]);
    }public function genre($slug){
        return view('pages.genre',[
            'title' => 'genre',
        ]);
    }public function country($slug){
        return view('pages.country',[
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
