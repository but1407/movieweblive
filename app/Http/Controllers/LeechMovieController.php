<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeechMovieController extends Controller
{
    public function leech_movie(){
        $urls = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1')->json();
        
        return view('admin.leech.index',[
            'urls' => $urls,
            'title' => 'Leech Movie'
        ]); 
    }
    public function leech_detail($slug){
        $url = Http::get("https://ophim1.com/phim/".$slug)->json();
        return view('admin.leech.detail',[
            'url' => $url,
            'title' => 'Leech Detail'
        ]); 
    }
    public function leech_store($slug){
        $url = Http::get("https://ophim1.com/phim/".$slug)->json();
        $info_movie = $url['movie'];
        dd($info_movie);
        $movie =Movie::create([
            'title' => $info_movie['name'],
            'description' => $info_movie['content'],
            'trailer' => $info_movie['trailer_url'],
            'sotap' => $info_movie['episode_total'],
            'thuocphim' => $info_movie['thuocphim'],
            'status' => 1,
            'slug' => $info_movie['slug'],


            'movie_duration' => $info_movie['movie_duration'],
            'image' => $info_movie['image'],
            'country_id' => $info_movie['country_id'],
            'name_eng' => $info_movie['origin_name'],
            'resolution' => $info_movie['resolution'],
            'vietsub' => $info_movie['vietsub'],
            'genre_id' => $info_movie['genre_id'],
            'hot_movie' => $info_movie['hot_movie'],
            'category_id' => $info_movie['category_id'],
        ]);

        // //add more genre
        // $movie->movieGenres()->attach($request->genre);

        //add more category
        $movie->movieCategories()->attach($info_movie['category']);
        return $url;
    }
}
