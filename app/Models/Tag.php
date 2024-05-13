<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tags';

    public function movies(){
        return $this
        ->belongsToMany(Movie::class, 'movie_tags','tag_id','movie_id');
    }
}
