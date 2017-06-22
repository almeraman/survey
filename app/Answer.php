<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'survey_id', 'answer',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
