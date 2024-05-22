<?php

namespace App\Http\Controllers\Admin;

use App\Models\Info;
use Illuminate\Http\Request;
use App\Services\MovieService;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    private $movieService;
    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
    }
    public function index(){

    }
    public function create(){
        $info = Info::where([
            'active' => 1
        ])->get(); 
        return view('admin.info.form',[
            'title' => 'Cập nhật thông tin Website',
            // 'info' => $info
        ]);
    }
    public function store(Request $request){
        try {
            $image = $this->movieService->uploadImage($request);
            Info::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'active' => $request->status,
                'logo' => $image['image']
            ]);

        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success','create dashboard Successfully');
    }
    public function update(){
        
    }
}
