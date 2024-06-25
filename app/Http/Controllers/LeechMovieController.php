<?php

namespace App\Http\Controllers;

use App\Models\Country;
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
        $country = Country::where('slug',$info_movie['country'][0]['slug'])->first();
        $category = Country::where('slug',$info_movie['category'][0]['slug'])->first();
        
        $movie =Movie::create([
            'title' => $info_movie['name'],
            'description' => $info_movie['content'],
            'trailer' => $info_movie['trailer_url'],
            'sotap' => $info_movie['episode_total'],
            'thuocphim' => $info_movie['chieurap'] == false ? '1' :'0',
            'status' => 0,
            'slug' => $info_movie['slug'],

            'resolution' => 0,
            'movie_duration' => $info_movie['time'],
            'image' => $info_movie['thumb_url'],
            'country_id' => $country->id ?? 0,
            'name_eng' => $info_movie['origin_name'],
            'vietsub' => $info_movie['lang'] == 'vietsub' ? 1 : 0,
            'genre_id' => 0,
            'hot_movie' => 0,
            'category_id' => $category->id ?? 0,
        ]);

        // //add more genre
        // $movie->movieGenres()->attach($request->genre);

        //add more category
        // $movie->movieCategories()->attach($info_movie['category']);
        return redirect()->back()->with('success','Add movie Successfully');
    }
}
