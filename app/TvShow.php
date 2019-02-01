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

    protected $fillable = ['show'];

    public function episodes()
    {
        return $this->hasMany('App\Episode', 'tv_show_id', 'show');
    }

    public function getEpisodesWatchedAttribute()
    {   
        
        $episodesWatched = $this->episodes()->where('watched', true)->where('user_id', auth()->user()->id)->count();
        
        return $episodesWatched;
    }

    public function getEpisodesUnwatchedAttribute()
    {   
        return $this->number_of_episodes - $this->episodes_watched;
    }

    
}
