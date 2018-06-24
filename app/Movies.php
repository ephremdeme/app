<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
    protected $fillable = [
        'movie_name', 'image', 'description', 'price',
    ];
    public function comment(){
      return $this->hasMany(Usercomment::class);
    }
}
