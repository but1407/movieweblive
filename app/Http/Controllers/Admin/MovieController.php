<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MovieService;
// use App\Services\MovieService;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $movieService;
    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;

    }
    public function index()
    {
        $lists = Movie::orderBy('id','desc')->get();
        return view('admin.movie.index',[
            'lists'=>$lists,
            'title'=> 'Quản lý Phim',
            
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        return view('admin.movie.form',[
            'title'=> 'Quản lý Phim',
            'category'=>$category,
            'country'=>$country,
            'genre'=>$genre
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $this->movieService->uploadImage($request);

        if($image != false){
            $store = Movie::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                // 'slug' => $request->slug,
                'image'=> $image['image'],
                'country_id' => $request->country_id,
                'name_eng' => $request->name_eng,

                'genre_id' => $request->genre_id,
                'hot_movie' => $request->hot_movie,

                'category_id' => $request->category_id

            ]);
            return redirect()->back();
        }
        return false;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $lists = Movie::orderBy('id','desc')->get();

        $movie = Movie::find($id);
        return view('admin.movie.form',[
            'lists'=>$lists,
            'title'=> 'Quản lý Phim',
            'category'=>$category,
            'country'=>$country,
            'genre'=>$genre,
            'movie'=>$movie,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $this->movieService->uploadImage($request);
        $movie = Movie::find($id);
        $get_image = $request->file('image');
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        if($image != false){
            $movie->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
                'name_eng' => $request->name_eng,

                'image'=> $image['image'],
                'country_id' => $request->country_id,
                'genre_id' => $request->genre_id,
                'category_id' => $request->category_id,
                'hot_movie' => $request->hot_movie,

            ]);
            return redirect()->back();
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie =Movie::find($id);
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
