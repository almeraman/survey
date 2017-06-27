<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'question_id', 'user_id', 'survey_id', 'answer', 'created_at',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
