<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_categories extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "movie_categories";
}
