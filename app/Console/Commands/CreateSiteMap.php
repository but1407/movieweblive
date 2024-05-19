<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use App\Models\Episode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = App::make('sitemap');
        $sitemap->add(route('home'), Carbon::now(), '1.0', 'daily');
        //get all genre
        $genres = Genre::orderByDesc('updated_at')->get();
        foreach ($genres as $gen) {
            $sitemap->add(
                env('APP_URL') . "genre/{$gen->slug}",
                Carbon::now('Asia/Ho_Chi_Minh'),
                '0.7',
                'daily'
            );
        }

        //get all category
        $categories = Category::orderByDesc('updated_at')->get();
        foreach($categories as $cate){
            $sitemap->add(env('APP_URL') . "genre/{$cate->slug}",Carbon::now('Asia/Ho_Chi_Minh'),
            '0.7', 'daily'
            );

        }

        //get all country
        $countries = Country::orderByDesc('updated_at')->get();
        foreach($countries as $country){
            $sitemap->add(env('APP_URL') . "genre/{$country->slug}",Carbon::now('Asia/Ho_Chi_Minh'),
            '0.7', 'daily'
            );
        }

        //get all movie
        $movies = Movie::orderByDesc('updated_at')->get();
        foreach($movies as $movie){
            $sitemap->add(env('APP_URL') . "genre/{$movie->slug}",Carbon::now('Asia/Ho_Chi_Minh'),
            '0.7', 'daily'
            );
        }

        //get all episode
        $movie_ep = Movie::with('episodes')->orderByDesc('updated_at')->get();
        $episode = Episode::all();
        foreach($movie_ep as $movie){
            foreach($episode as $ep){
                if($movie->id == $ep->movie_id){

                    $sitemap->add(env('APP_URL') . "genre/{$movie->slug}/episode-{$ep->episode}",Carbon::now('Asia/Ho_Chi_Minh'),
                    '0.7', 'daily'
                    );
                }
            }
        }

        //get all episode
        $years = range(Carbon::now('Asia/Ho_Chi_Minh')->year,2000);
        foreach($years as $year){
            $sitemap->add(env('APP_URL') . "year/{$year}",Carbon::now('Asia/Ho_Chi_Minh'),
            '0.7', 'daily'
            );
        }

        $sitemap->store('xml', 'sitemap');
        if(File::exists(base_path() . "/sitemap.xml")){
            File::copy(public_path('sitemap.xml'), base_path('sitemap.xml'));
        }
    }
}
