<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\EpisodeService;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $episodeService;
    protected $episode;

    public function __construct(EpisodeService $episodeService,Episode $episode){
        $this->episodeService = $episodeService;
        $this->episode = $episode;
        
    }
    public function index()
    {

        $list_episode = $this->episode->with('movies')->orderBy('movie_id' ,'desc')->get() ;
    
        return view('admin.episode.index',[
            'title'=>'List Movie',
            'list_episode'=>$list_episode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title','id');
        return view('admin.episode.form',[
            'list_movie'=>$list_movie,
            'title'=>'Thêm tập phim',
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
        if($this->episodeService->create($request)){
            return redirect()->back(); 
        }
        return response()->json([
            'error' =>'Có lỗi trong quy trình tạo'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_movie = Movie::orderBy('id', 'desc')->pluck('title','id');

        $episode = Episode::find($id);
        return view('admin.episode.form',[
            'list_movie'=>$list_movie,
            'episode'=>$episode,

            'title'=>'Thêm tập phim',
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
        if($this->episodeService->update($request, $id)){
            return redirect()->route('episode.index');
        }
        return response()->json([
            'error' => 'Lỗi update'
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
        //
    }

    public function select_movie(Request $request){
        $id = $request->get('id');
        $movie = Movie::find($id);
        $output = '<option value="">Chọn tập phim</option>';
        for ($i = 1; $i <= $movie->sotap;$i++ ){
            $output .= '<option value="'.$i .'">'.$i.'</option>';
        }
        return $output;
        
    }
}
