<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function countries(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function genres(){
        return $this->belongsTo(Genre::class,'genre_id');
    }
    public function movieGenres(){
        return $this->belongsToMany(Genre::class,
        'movie_genres',
        'movie_id','genre_id');
    }
    public function episodes(){
        return $this->hasMany(Episode::class)->orderBy('id', 'asc');
    }
    public function tags(){
        return $this
        ->belongsToMany(Tag::class, 'movie_tags','movie_id','tag_id');
    }
}
