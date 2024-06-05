<?php

namespace App\Http\Controllers\Admin;

use App\Models\LinkMovie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkMovie\LinkMovieRequest;

class LinkMovieController extends Controller
{
    public function index(){
        $lists = LinkMovie::orderBy('updated_at','asc')->get();
        return view('admin.link_movie.index',['lists'=>$lists,'title'=> 'Quản lý Link Movie']);
    }
    public function create(){
        return view('admin.link_movie.form',['title'=> 'Tạo Link Movie']);
    }
    public function store(LinkMovieRequest $request){
        try {
            LinkMovie::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success','create Link Movie Successfully');
    } 
    public function destroy($id){
        try{
            LinkMovie::find($id)->delete();
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Destroyed Link Movie successfully');
    }
    public function edit(Request $request, $id)
    {
        $linkmovie = LinkMovie::find($id);
        $title = 'Sua danh muc';
        return view('admin.link_movie.form',compact('title','linkmovie'));
    }
    public function update(Request $request,$id){
        try{
            LinkMovie::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
            ]);
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('linkmovie.index')->with('success', 'Updated Successfully');
    }
}
