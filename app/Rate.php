<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    public function user()
    {
      // code...
      return $this->belongsTo(User::class);
    }
}
