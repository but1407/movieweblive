<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\MovieService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Movie\MovieCreateRequest;

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
        $lists = Movie::with('categories', 'countries', 'genres')->withCount('episodes')->orderBy('id','desc')->get();
        $path = public_path() . '/json\/';
        $categories = Category::pluck('title', 'id'); 
        $countries = Country::pluck('title', 'id'); 
        if(!is_dir($path)){
            mkdir($path ,0777, true);
        }
        File::put($path . 'movies.json', json_encode($lists));
        return view('admin.movie.index',[
            'lists'=>$lists,
            'categories'=>$categories,
            'countries'=>$countries,
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
        $list_genre = Genre::orderBy('updated_at', 'DESC')->get();
        $list_category = Category::orderBy('updated_at', 'DESC')->get();
        return view('admin.movie.form',[
            'title'=> 'Quản lý Phim',
            'category'=>$category,
            'country'=>$country,
            'genre'=>$genre,
            'list_genre'=>$list_genre,
            'list_category'=>$list_category,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieCreateRequest $request)
    {
        try{
            DB::beginTransaction();
            // Image
            $image = $this->movieService->uploadImage($request);
            if ($image) {
                //Movie
                $create = $this->movieService->create($request, $image);
                //tags
                if (!empty($request->tags)) {
                    $tagIds = $this->movieService->storeTags($request);
                    $create->tags()->attach($tagIds);
                }
            }
            if(!$image){
                return redirect()->back()->with('error', 'Movie created failed from image');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: '. $e->getMessage() . '  Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Movie created failed');
        }
        return redirect()->route('movie.index')->with('success', 'Movie created');
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
        $list_genre = Genre::orderBy('id', 'DESC')->get();

        $genre = Genre::pluck('title','id');
        $lists = Movie::orderBy('id','desc')->get();

        $movie = Movie::find($id);
        $list_category = Category::orderBy('updated_at', 'DESC')->get();
        
        return view('admin.movie.form',[
            'lists'=>$lists,
            'title'=> 'Quản lý Phim',
            'category'=>$category,
            'country'=>$country,
            'genre'=>$genre,
            'movie'=>$movie,
            'list_genre'=>$list_genre,
            'list_category'=>$list_category,
            
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieCreateRequest $request, $id)
    {
        if($request->file('image')){
            $image = $this->movieService->uploadImage($request);
        }
        $movie = Movie::find($id);
        if ($request->file('image')) {
            $this->movieService->file_exist($movie);
        }
        $update = $this->movieService->update($request, $movie, $image ?? null, $movie);
        if($update){
            return redirect()->route('movie.index')->with('success', 'Movie Created Successfully');
        }
        return redirect()->back()->with('error', 'Lỗi không cật nhật được'); 
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
        $file_exist = $this->movieService->file_exist($movie);
        if(!$file_exist){
            return redirect()->back()->with('error', 'Delete failed');
        }
        //detach thể loại
        $movie->movieGenres()->detach();
        //xóa tập phim
        $movie->episodes()->delete();
        //xóa phim
        $movie->delete();

        return redirect()->back()->with('success', 'Delete Successfully');
    }
    public function update_year(Request $request){
        $data = $request->all();

        $movie =Movie::find($data['id_phim'])->update(
            [
                'year' => $data['year'],
            ]   
        );
        if($movie instanceof Movie){
            toastr()->success('Data has been saved successfully!');
        }
    }
    public function update_topview(Request $request){
        $data = $request->all();

        Movie::find($data['id_phim'])->update(
            [
                'topview' => $data['topview'],
            ]
        );
    }
    public function season_update(Request $request){
        $data = $request->all();
        Movie::find($data['id_phim'])->update(
            [
                'season' => $data['season'],
            ]
        );
    }
    public function update_category(Request $request){
        Movie::find($request->movie_id)->update([
            'category_id' => $request->category_id
        ]);
        
    }
    public function update_country(Request $request){
        Movie::find($request->movie_id)->update([
            'country_id' => $request->country_id
        ]);
        
    }
    
    public function update_status(Request $request){
        Movie::find($request->movie_id)->update([
            'status' => $request->status_val
        ]);
        
    }

    public function update_thuocphim(Request $request){
        Movie::find($request->movie_id)->update([
            'thuocphim' => $request->thuocphim_val
        ]);
        
    }

    public function update_hotmovie(Request $request){
        Movie::find($request->movie_id)->update([
            'hot_movie' => $request->hotmovie_val
        ]);
        
    }

    public function update_vietsub(Request $request){
        Movie::find($request->movie_id)->update([
            'vietsub' => $request->vietsub_val
        ]);
        
    }
    
    public function update_image_movie(Request $request){
        $get_image = $request->file('file');
        $movie_id = $request->movie_id;

        if($get_image){
            //delete old image
            $movie = Movie::find($movie_id);
            if(File::exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            //name image
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image.'-'. rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/' , $new_image);
            //save the new image
            $movie->image = $new_image;
            $movie->save();
        }
        
    }
    public function watch_video(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $video = $movie->episodes->where('episode', $data['episode_id'])->first();
        $output['video_title'] = $movie->title . '- episode ' . $video->episode;
        $output['video_desc'] = $movie->description;
        $output['video_link'] = $video->movie_link;
        echo json_encode($output);
    }
    public function movie_sort(){
        $categories = Category::where('status',1)->orderBy('updated_at','DESC')->get();
        $category_home = Category::with('movies')->orderByDesc('updated_at')->where('status',1)->get();

        return view('admin.movie.sort_movie',[
            'title' => 'Movie Sort',
            'categories'=> $categories,
            'category_home'=> $category_home,
        ]);
    }
    public function show()
    {
    }
    public function resorting_navbar(Request $request){
        foreach($request->array_id as $key => $val){
            Category::find($val)->update([
                'position' => $key,
            ]);
        }   
    }
    public function resorting_movie(Request $request){
        foreach($request->movie_arr as $key => $val){
            Movie::find($val)->update([
                'position' => $key,
            ]);
        }   
    }

}
