<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    public $timestamps = true;

    protected $fillable = [
        'company_id', 'title', 'age_range_min', 'age_rage_max', 'start_date', 'end_date', 'value',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function users()
    {
        return $this->belongsToMany('App\User'); //many to many pivot relation
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
}
