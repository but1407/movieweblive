<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class LeechMovieController extends Controller
{
    public function leech_movie(){
        $urls = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1')->json();
        return view('admin.leech.index',[
            'urls' => $urls,
            'title' => 'Leech Movie'
        ]); 
    }
}
