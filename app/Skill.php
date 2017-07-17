<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function profile_skill()
    {
        return $this->belongsTo('App\Profile_Skill');
    }

}
