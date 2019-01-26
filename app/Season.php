<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['_id',
        'tv_show_id',
        'air_date',
        'name',
        'overview',
        'poster_path',
        'season_number',
        'user_id'
    ];

    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }
}
