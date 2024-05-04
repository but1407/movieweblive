<?php

namespace App\Http\Requests\Episode;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeCreateRequest extends FormRequest
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
            'movie_id' => 'required',
            'movie_link' => 'required',
            'episode' => 'required',

        ];
    }
    public function messages() :array{
        return [
            'movie_id.required' => 'Hãy chọn phim',
            'movie_link.required' => 'Link phim không được bỏ trống',
            'episode.required' => 'Hãy chọn tập phim',
        ];
    }
}
