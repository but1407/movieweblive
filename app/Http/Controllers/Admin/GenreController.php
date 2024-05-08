<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\GenreCreateRequest;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = Genre::all();
        return view('admin.genre.form',['lists' => $lists,
        'title' => 'Quản lý thể loại'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreCreateRequest $request)
    {
        try {
            Genre::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
    
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('error','Failed to create');
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
        $genre = Genre::find($id);
        $lists = Genre::all();
        $title = 'Sua the loai';
    
        return view('admin.genre.form',compact('title','genre','lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreCreateRequest $request, $id)
    {
        try {
            Genre::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('error', 'Failed to update');
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
            Genre::find($id)->delete();
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
        return redirect()->back()->with('success', 'destroy successfully');
    }
}
