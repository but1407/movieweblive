<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Episode;
use App\Modelsmovie_id;
use App\Models\Category;
use App\Models\movie_id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    protected $movie;
    protected $genre;
    protected $country;
    protected $episode;
    protected $category;
    public function __construct(Episode $episode,
                                Category $category,
                                Country $country,
                                Genre $genre,
                                Movie $movie,
                                ){
        $this->episode = $episode;
        $this->category = $category;
        $this->country = $country;
        $this->genre = $genre;
        $this->movie = $movie;
    }
    public function search(Request $request){
        if(isset($request->search)){
            $search = $request->search;
            $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
            $country = $this->country->orderByDesc('updated_at')->get();
            $movie = $this->movie->where('title','LIKE','%'.$search.'%')
            ->orderByDesc('updated_at')->paginate(10);
            
            return view('pages.search',[
                'country' => $country,
                'search'=>$search,
                'title' => 'category',
                'movies' => $movie,
                'phimhot_trailer'=>$phimhot_trailer,
            ]);
        } else{
            redirect()->to('/');
        }
    }
    public function index(){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $phimhot = $this->movie->with('episodes')->where(function ($query) {
            $query->where('hot_movie', 1)->where('status', 1);
        })->orderByDesc('updated_at')->get();
        $category_home = $this->category->with('movies')->orderByDesc('updated_at')->where('status',1)->get();
        return view('pages.home',[
            'title' => 'Home',
            'category_home' => $category_home,
            'phimhot' =>$phimhot,
            'phimhot_trailer'=>$phimhot_trailer,
        ]);
    }
    public function category(Request $request,$slug){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $country = $this->country->orderByDesc('updated_at')->get();
        $category_slug = $this->category->where('slug', $slug)->first();
        $genres = $this->genre->orderByDesc('updated_at')->get();
        $movies = $category_slug->movies();
        $movies = $this->category->filter($request, $movies);
        
        return view('pages.category',[
            'title' => $category_slug->title,
            'country' => $country,
            'category_slug'=>$category_slug,
            'movies' => $movies,
            'phimhot_trailer'=>$phimhot_trailer,
            'genres'=>$genres,
        ]);
    }
    public function year($year){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $movies = $this->movie->where('year', $year)->orderByDesc('created_at')->get();
        // $year = $year;
    
        return view('pages.year',[
            'year' => $year,
            'movies'=>$movies,
            'title' => 'year',
            'phimhot_trailer'=>$phimhot_trailer,
            
        ]);
    }
    public function genre($slug){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $genre_slug = $this->genre->where('slug', $slug)->first();
        //more genre
        $movie_genre = $this->genre->find($genre_slug->id)->genreMovies;
        $many_renre = [];
        foreach($movie_genre as  $movie){
            $many_renre[] = $movie->id;
        }
        // $movies = $genre_slug->movies()->whereIn('id',$many_renre)->paginate(40);
        $movies = $this->movie->whereIn('id',$many_renre)
        ->orderByDesc('created_at')->paginate(40);
        return view('pages.genre',[
            'title' => $this->genre->find($genre_slug->id)->title,
            'genre_slug'=>$genre_slug,
            'movies' => $movies,
            'phimhot_trailer'=>$phimhot_trailer,
            
        ]);
    }
    public function country($slug){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $country = $this->country->orderByDesc('updated_at')->get();
        $country_slug = $this->country->where('slug', $slug)->first();
        $movies = $country_slug->movies()->paginate(40);

        return view('pages.country',[
            'title' => $country_slug->title,
            'country' => $country,
            'country_slug'=>$country_slug,
            'movies' => $movies,
            'phimhot_trailer'=>$phimhot_trailer,
            

        ]);
    }
    public function movie($slug){
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $movie = $this->movie->with('genres','countries','categories')->where('slug',$slug)
        ->where('status',1)
        ->first();
        $episode_fistep = $this->episode->with('movies')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->first();
        $related = $this->movie->with('genres','countries','categories')->where('category_id',$movie->categories->id)
        ->orderBy(DB::raw('RAND()'))
        ->whereNotIn('slug',[$slug])->get();
        
        //Lấy 3 tập gần nhất
        $episode = $this->episode->with('movies')->where('movie_id', $movie->id)->orderByDesc('episode')->take(3)->get();
        
        //Lấy hết tập phim đã thêm
        $episode_current_list= $this->episode->with('movies')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();
        
        //rating
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();
        return view('pages.movie',[
            'title' => 'movie',
            'movie'=>$movie,
            'related'=>$related,
            'phimhot_trailer'=>$phimhot_trailer,
            'episode'=>$episode,
            'episode_fistep'=>$episode_fistep,
            'episode_current_list_count'=>$episode_current_list_count,
            'count_total'=>$count_total,
            'rating'=>$rating,
            

        ]);
    }public function episode(){
        return view('pages.episode',[
            'title' => 'episode',
        ]);
    }
    public function tags($tag){
        
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $movies = $this->movie->where('tags','LIKE','%'.$tag.'%')->orderBy('updated_at','DESC')->paginate(40);
        // $tag = $tag;

        return view('pages.tags',[
            'title' => 'Tags',
            'movies' => $movies,
            'tag'=> $tag,
            'phimhot_trailer'=>$phimhot_trailer,
        ]);
    }
    public function watch($slug,$tap){
        $tapphim = isset($tap) ? $tap : 1;
        $phimhot_trailer = $this->movie->where('resolution',5)->where('status',1)->orderBy('updated_at','DESC')->take(10)->get();
        $movie = $this->movie->with('categories', 'genres', 'episodes', 'movieGenres', 'countries')->where('slug',$slug)
        ->where('status',1)
        ->first();
        
        $related = $this->movie->with('genres','countries','categories')->where('category_id',$movie->categories->id)
        ->orderBy(DB::raw('RAND()'))
        ->whereNotIn('slug',[$slug])->get();
        $episode = $this->episode->where('movie_id', $movie->id)->where('episode',$tapphim)->first();
        
    
        return view('pages.watch',[
            'title' => 'movie',
            'movie'=>$movie,
            'phimhot_trailer'=>$phimhot_trailer,
            'episode'=>$episode,
            'tapphim'=>$tapphim,
            'related'=>$related,
        ]);
    }
    public function increment_view(Request $request){
        $movie = Movie::find($request->id);
        if($movie->increment('view')){
            return response()->json([
                'success' => 'Increment view successfully',
                'view'=>$movie->view
            ]);
        }
        return response()->json([
            'error' => 'Increment view Failed',
            
        ]);
    }
    public function add_rating(Request $request){
        $rating_count = Rating::where('movie_id',$request->movie_id)->where('ip_address',$request->ip_address)->count();
        $data = $request->all();
        if($rating_count >= 0){
            Rating::create([
                'movie_id' =>$data['movie_id'],
                'rating' => $data['index'],
                'ip_address' => $request->ip(),
            ]);
            echo 'done';
        } else{
            echo 'exist';
        }
    }
    
}
