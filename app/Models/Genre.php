<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function movies(){
        return $this->hasMany(Movie::class)->orderBy('id', 'asc');
    }
    public function genreMovies(){
        return $this->belongsToMany(Movie::class,
        'movie_genres',
        'genre_id',
        'movie_id');

    }
}
