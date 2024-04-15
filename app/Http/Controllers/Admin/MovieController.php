<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $path = public_path() . '/json\/';

        if(!is_dir($path)){
            mkdir($path ,0777, true);
        }
        File::put($path . 'movies.json', json_encode($lists));
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
        $list_genre = Genre::orderBy('id', 'DESC')->get();
        return view('admin.movie.form',[
            'title'=> 'Quản lý Phim',
            'category'=>$category,
            'country'=>$country,
            'genre'=>$genre,
            'list_genre'=>$list_genre,
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
            $create = $this->movieService->create($request,$image);
            if($create){

                return redirect()->route('movie.index');
            } 
            return response()->json([
                'error'=>'Lỗi không tạo được'
            ]);
            
        }
        return response()->json([
            'error'=>'Lỗi không xác định'
        ]);

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
        $list_genre = Genre::orderBy('id', 'DESC')->get();

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
            'list_genre'=>$list_genre,
            
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
        $file_exist = $this->movieService->file_exist($movie);
        if(!$file_exist){
            return response()->json([
                'msg' => 'Loi khong xoa duoc file'
            ]);
        }
        if($image != false){
            $update = $this->movieService->update($request, $movie,$image,$movie );
            if($update){

                return redirect()->route('movie.index');

            }
            return response()->json([
                'error'=>'Lỗi không cat nhat duoc'
            ]);
        }
        return response()->json([
            'error'=>'Lỗi không xác định'
        ]);
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
            return response()->json([
                'msg' => 'Loi khong xoa duoc file'
            ]);
        }
        $movie->delete();
        return redirect()->back();
    }
    public function update_year($request){
        $data = $request->all();

        $movie = Movie::find($data['id_phim'])->update(
            [
                'year' => $data['year'],
            ]
        );
    }
    public function update_topview($request){
        $data = $request->all();

        $movie = Movie::find($data['id_phim'])->update(
            [
                'topview' => $data['topview'],
            ]
        );
    }
    public function update_season($request){
        $data = $request->all();

        $movie = Movie::find($data['id_phim'])->update(
            [
                'season' => $data['season'],
            ]
        );
    }
}
