<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('home',[
            'title' => 'Home',
        ]);
    }
    public function category(){
        return view('pages.category',[
            'title' => 'category',
        ]);
    }public function genre(){
        return view('pages.genre',[
            'title' => 'genre',
        ]);
    }public function country(){
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
