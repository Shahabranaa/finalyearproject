<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function category()
    {
     $this->hasOne('App\Category');
    }
}
