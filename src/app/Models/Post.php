<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function images(){
        return $this->morphMany(Images::class,'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function reactions(){
        return $this->morphedToMany(Reaction::class,'reactable');
    }


}
