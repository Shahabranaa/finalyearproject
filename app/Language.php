<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function profiles()
    {
        return $this->belongsToMany('App\Profile', 'foreign_key');
    }
}
