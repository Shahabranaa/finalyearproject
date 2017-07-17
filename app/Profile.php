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
    public function language_profiles()
    {
        return $this->hasMany('App\Language_Profile');
    }
    public function profile_skills()
    {
        return $this->hasMany('App\Profile_skill');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function gigs()
    {
        return $this->hasMany('App\Gig');
    }
//    public function reviews()
//    {
//        return $this->hasMany('App\Review');
//    }

}
