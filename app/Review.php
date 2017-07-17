<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    public function gig()
    {
        return $this->belongsTo('App\Gig');
    }

}
