<?php

namespace App\Services;


class MovieService
{
    public function uploadImage($request){
        $data=[];
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        try {
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
                $name_image = current(explode('.', $get_name_image)); // current([0]=>hinhanh1) , [1]=>jpg
                $new_image =$name_image. '-' .rand(0000,9999) . '.' . $get_image->getClientOriginalExtension();//hinhanh1-2569.jpg
                $get_image->move($path, $new_image);
                // File::copy($path.$new_image,$path_gallery.$new_image);
                $data['image'] = $new_image;
            }
        } catch (\Exception $e) {
            return false;
        }
        return $data;
    }
}