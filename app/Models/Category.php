<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movies(){
        return $this->hasMany(Movie::class,'category_id')->orderBy('id', 'asc');
    }

    public function filter($request, $movies){
        $array = ['status'=> 1];
        if($request->type){
            $array['thuocphim'] = $request->type;
        }
        if($request->country){
            $array['country_id'] = $request->country;
        }
        if($request->year){
            $array['year'] = $request->year;
        }
        if($request->genre){
            $genre_id = $request->genre;
            $movies = $movies->whereHas('genres',function($q) use ($genre_id){
                        $q->where('id', $genre_id);
            });
        }
        $movies = $movies->where($array);
        if($request->sort){
            $movies = $movies->orderBy($request->sort,'DESC');
        }
        return $movies->paginate(40);
    }
}
