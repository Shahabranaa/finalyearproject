<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function language_profile()
    {
        return $this->belongsTo('App\Language_Profile');
    }
}
