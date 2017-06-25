<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'name', 'address',
    ];

    public function surveys()
    {
        return $this->hasMany('App\Survey');
    }
}
