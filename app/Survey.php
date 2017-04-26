<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    protected $fillable = [
        'company_id', 'title', 'age_range_min', 'age_rage_max', 'start_date', 'end_date',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }


}
