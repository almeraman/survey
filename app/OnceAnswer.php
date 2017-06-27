<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnceAnswer extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'question_id', 'survey_id', 'answer', 'created_at',
    ];
}
