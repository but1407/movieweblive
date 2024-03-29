<?php

namespace App\Services;

use App\Models\Movie;


class MovieService
{
    private $movie;
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }
    public function uploadImage($request)
    {
        $data = [];
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        try {
            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
                $name_image = current(explode('.', $get_name_image)); // current([0]=>hinhanh1) , [1]=>jpg
                $new_image = $name_image . '-' . rand(0000, 9999) . '.' . $get_image->getClientOriginalExtension();//hinhanh1-2569.jpg
                $get_image->move($path, $new_image);
                // File::copy($path.$new_image,$path_gallery.$new_image);
                $data['image'] = $new_image;
            }
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }
    public function create($request, $image)
    {
        try {
            $this->movie->create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'slug' => $request->slug,
                'movie_duration' => $request->movie_duration,
                'image' => $image['image'],
                'country_id' => $request->country_id,
                'name_eng' => $request->name_eng,
                'resolution' => $request->resolution,
                'vietsub' => $request->vietsub,
                'genre_id' => $request->genre_id,
                'hot_movie' => $request->hot_movie,
                'category_id' => $request->category_id

            ]);
        } catch (\Exception $e) {
            return false;

        }
        return true;
    }
    public function update($request,$model,$image){
        try{

            $model->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
                'name_eng' => $request->name_eng,
                'image'=> $image['image'] ?? null,
                'country_id' => $request->country_id,
                'genre_id' => $request->genre_id,
                'resolution'=>$request->resolution,
                'vietsub'=>$request->vietsub,
                'category_id' => $request->category_id,
                'hot_movie' => $request->hot_movie,
                'movie_duration' => $request->movie_duration,
                
            ]);
        } catch(\Exception $e){
            return false;
        }
        return true;

    }
    public function file_exist($model){
        try{
            if(file_exists('uploads/movie'.$model->image)){
                unlink('uploads/movie/'.$model->image);
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;

    }
}