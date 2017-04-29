<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function profiles()
    {
        return $this->belongsTo('App\Profile', 'foreign_key');
    }
}
