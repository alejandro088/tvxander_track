<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $appends = ['episodes_watched', 'episodes_unwatched'];

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
        return $this->hasMany(Episode::class, 'show_id', 'show');
    }

    public function getEpisodesWatchedAttribute()
    {   
        
        return $this->episodes()->where('watched', true)->where('user_id', auth()->user()->id)->count();
    
    }

    public function getEpisodesUnwatchedAttribute()
    {   
        return $this->number_of_episodes - $this->episodes_watched;
    }
}
