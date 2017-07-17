<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function gigs()
    {
        $this->belongsToMany('App\Gig');
    }
}
