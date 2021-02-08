<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
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
        return $this->belongsTo(Season::class);
    }

}
