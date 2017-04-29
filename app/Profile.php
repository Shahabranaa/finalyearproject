<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function address()
    {
        return $this->hasOne('App\Address');
    }
    public function languages()
    {
        return $this->hasMany('App\Language');
    }
    public function skills()
    {
        return $this->hasMany('App\Skill');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function gigs()
    {
        return $this->hasMany('App\Gig');
    }
}
