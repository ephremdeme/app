<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function user()
    {
      // code...
      return $this->belongsTo(User::class);
    }
}
