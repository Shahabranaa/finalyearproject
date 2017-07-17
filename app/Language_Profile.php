<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_Profile extends Model
{
    protected $table = 'language_profile';

    public function languages()
    {
        $this->hasMany('App\Language');
    }
}
