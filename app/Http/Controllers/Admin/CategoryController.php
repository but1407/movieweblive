<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = Category::orderBy('position','asc')->get();
        return view('admin.category.form',['lists'=>$lists, 'title'=> 'Quản lý danh mục']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        try {
            Category::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success','create dashboard Successfully');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $lists = Category::orderBy('position','asc')->get();
        $title = 'Sua danh muc';
        return view('admin.category.form',compact('title','category','lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, $id)
    {
        try{
            Category::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
                
            ]);
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Updated Successfully');
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
            Category::find($id)->delete();
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Destroyed category successfully');
    }
    public function resorting(Request $request){
        $data = $request->all();
        foreach($data['array_id'] as $key => $value){
            $category = Category::find($value);
            $category->positions = $key;
            $category->save();
        }
    }
}
