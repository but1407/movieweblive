<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class MovieCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'name_eng' => 'required',
            'movie_duration' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages() : array{
        return [
            'title.required' => 'Trường title không được bỏ trống',
            'name_eng.required' => 'Trường name_eng không được bỏ trống',
            'movie_duration.required' => 'Trường Thời lượng phim không được bỏ trống',
            'tags.required' => 'Trường tags không được bỏ trống',
            'image.required' => 'Ảnh không được bỏ trống',
            'image.image' => 'Image phải là định dạng image',
            'image.mimes' => 'file phải có đuôi jpeg,png,jpg hoặc gif',
            'image.max' => 'file không được vượt quá 2MB',

        ];
    }
}
