<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'label', 'survey_id', 'has_multi',
    ];

    public function multi_choice()
    {
        return $this->hasMany('App\Multi_choice');
    }

}
