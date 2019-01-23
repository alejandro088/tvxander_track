<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
    protected $table = 'tv_shows';
    
    protected $casts = [
        'created_by' => 'array',
        'genres' => 'array',
        'production_companies' => 'array',
        'networks' => 'array',
        'next_episode_to_air' => 'array',
        'last_episode_to_air' => 'array'
    ];
}
