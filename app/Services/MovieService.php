<?php

namespace App\Services;

use App\Models\Tag;
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
        //TODO: Sửa path
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
        $genre_id = '';
        foreach($request->genre as $genre){
            $genre_id = $genre[0];
        }
        $category_id = '';
        foreach($request->category as $category){
            $category_id = $category[0];
        }
        $movie =$this->movie->create([
            'title' => $request->title,
            'description' => $request->description,
            'trailer' => $request->trailer,
            'sotap' => $request->sotap,
            'thuocphim' => $request->thuocphim,
            'status' => $request->status,
            'slug' => $request->slug,
            'movie_duration' => $request->movie_duration,
            'image' => $image['image'],
            'country_id' => $request->country_id,
            'name_eng' => $request->name_eng,
            'resolution' => $request->resolution,
            'vietsub' => $request->vietsub,
            'genre_id' => $genre_id,
            'hot_movie' => $request->hot_movie,
            'category_id' => $category_id,
            // 'tags' => $request->tags,

        ]);
        //add more genre
        $movie->movieGenres()->attach($request->genre);

        //add more category
        $movie->movieCategories()->attach($request->category);
        
        return $movie;
    }
    public function update($request,$model,$image,$movie ){
        $genre_id = '';
        foreach($request->genre as $genre){
            $genre_id = $genre[0];
        }
        $category_id = '';
        foreach($request->category as $category){
            $category_id = $category[0];
        }
        try{

            $model->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status' => $request->status,
                'slug' => $request->slug,
                'name_eng' => $request->name_eng,
                'image'=> $image['image'] ?? null,
                'country_id' => $request->country_id,
                'genre_id' => $genre_id,
                'resolution'=>$request->resolution,
                'vietsub'=>$request->vietsub,
                'category_id' => $category_id,
                'hot_movie' => $request->hot_movie,
                'movie_duration' => $request->movie_duration,
                'tags' => $request->tags,
                'trailer' => $request->trailer,
                'sotap' => $request->sotap,
                'thuocphim' => $request->thuocphim,

            ]);
            //Sync Genres
            $movie->movieGenres()->sync($request->genre);
            
            //Sync Categories
            $movie->movieCategories()->sync($request->category);

        } catch(\Exception $e){
            return false;
        }
        return true;

    }
    public function file_exist($model){
        try{
            if(file_exists('uploads/movie/'.$model->image)){
                unlink('uploads/movie/' . $model->image);
            } else{
                return false;
            }

        } catch (\Exception $e) {
            return false;
        }
        return true;

    }
    public function storeTags($request){
        $tags = json_decode($request->tags, true);
        foreach($tags as $tagItem){
            $tagIntance = Tag::firstOrCreate([
                'name' => $tagItem,
            ]);
            $tagIds[] = $tagIntance->id;
        }
        return $tagIds;
    }
}