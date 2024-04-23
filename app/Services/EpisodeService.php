<?php

namespace App\Services;

use App\Models\Episode;
use App\Models\Movie;

class EpisodeService
{
    protected $episode;
    protected $movie;

    public function __construct(Episode $episode,Movie $movie){
        $this->episode = $episode;
        $this->movie = $movie;
    }
    public function create($request){
        $store = $this->movie->find($request->movie_id)->episodes()->create([
            'movie_link'=>$request->movie_link,
            'episode' => $request->episode,
        ]);
        if($store){

            return true;
        }
        return false;
    
    }
    public function update($request, $id){
        $store = $this->episode->find($id)->update([
            'movie_link'=>$request->movie_link,
        ]);
        if($store){

            return true;
        }
        return false;
    
    }
}