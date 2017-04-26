<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function surveys()
    {
        return $this->hasMany('App\Survey');
    }
}
