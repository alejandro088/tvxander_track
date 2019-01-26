<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['_id',
        'tv_show_id',
        'season_id',
        'vote_average_tmdb',
        'vote_count_tmdb',
        'air_date',
        'crew',
        'episode_number',
        'guest_stars',
        'name',
        'overview',
        'season_number',
        'still_path',
        'user_id'

    ];

    public function season()
    {
        return $this->belongsTo('App\Season','season_id','_id');
    }

    public function serie()
    {
        return $this->belongsTo('App\Episode','tv_show_id','_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
