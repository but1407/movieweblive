<?php

namespace App\Http\Controllers\Admin;

use App\Models\LinkMovie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkMovie\LinkMovieRequest;

class LinkMovieController extends Controller
{
    public function MovieLink(){
        return view('admin.link_movie.form',['title'=> 'Quản lý danh mục']);
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
}
