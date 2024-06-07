<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Episode\EpisodeCreateRequest;
use App\Models\Episode;
use App\Models\LinkMovie;
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
    public function store(EpisodeCreateRequest $request)
    {
        $episode_exist = Movie::find($request->movie_id)->episodes->pluck('episode')->contains($request->episode);
        if($episode_exist){
            return redirect()->back()->with('error', 'Episode '.$request->episode.' is exist!');
        }
        if($this->episodeService->create($request)){
            return redirect()->back()->with('success', 'Episode created successfully');
        }
        return redirect()->back()->with('error', 'Episode created failed');
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
        $link_movie = LinkMovie::orderBy('updated_at', 'desc')->pluck('title','id');

        $episode = Episode::find($id);
        return view('admin.episode.form',[
            'list_movie'=>$list_movie,
            'episode'=>$episode,
            'link_movie'=>$link_movie,
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
    public function update(EpisodeCreateRequest $request, $id)
    {
        if($this->episodeService->update($request, $id)){
            return redirect()->route('episode.index')->with('success', 'Episode updated');
        }
        return redirect()->back()->with('error', 'Episode updated failed');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->episode->find($id)->delete();
        } catch (\Exception $e){
            return redirect()->route('episode.index')->with('error', 'Delete episode failed');
        }
        return redirect()->route('episode.index')->with('success', 'Delete episode successfully');
    }

    public function select_movie(Request $request){
        $id = $request->get('id');
        $movie = Movie::find($id);
        $output = '<option value="">---------Chọn tập phim---------</option>';
        if($movie->thuocphim == 1){
            for ($i = 1; $i <= $movie->sotap;$i++ ){
                $output .= '<option value="'.$i .'">'.$i.'</option>';
            }
        }else{
            $output .= '<option value="HD">HD</option>
            <option value="FullHD">Full HD</option>';
        }

        return $output;
    }
    public function add_episode($id){
        $link_movie = LinkMovie::orderBy('updated_at', 'desc')->pluck('title','id');
        $movie = Movie::find($id);
        $list_server = LinkMovie::orderBy('updated_at', 'desc')->get();
        $list_episode = $this->episode->with('movies')->where('movie_id', $id)->orderByDesc('episode')->get();
        return view('admin.episode.add', [
            'movie' => $movie,
            'list_episode' => $list_episode,
            'link_movie' => $link_movie,
            'list_server' => $list_server,
            'title' =>'thêm tập phim',
        ]);
    }
}
