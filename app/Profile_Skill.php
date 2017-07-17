<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_Skill extends Model
{
    protected $table = 'profile_skill';

    public function skills()
    {
        $this->hasMany('App\Skill');
    }

}
