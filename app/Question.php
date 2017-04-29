<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'label',
    ];

    public function multi_choice()
    {
        return $this->hasMany('App\Multi_choice');
    }

}
