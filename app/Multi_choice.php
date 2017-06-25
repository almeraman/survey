<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multi_choice extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'question_id', 'label',
    ];
}
