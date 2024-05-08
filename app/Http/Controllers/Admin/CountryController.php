<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryCreateRequest;

class CountryController extends Controller
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
        $lists = Country::all();
        return view('admin.country.form',['lists' => $lists,
        'title' => 'Quản lý Quốc gia'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryCreateRequest $request)
    {
        try {
            Country::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
    
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
        return redirect()->back()->with('success', "Created successfully");
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
        $country = Country::find($id);
        $lists = Country::all();
        $title = 'Sua quoc gia';

        return view('admin.country.form',compact('title','country','lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryCreateRequest $request, $id)
    {
        try {
            Country::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
        return redirect()->back()->with("success","Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Country::find($id)->delete();
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success','Successfully deleted');
    }
}
