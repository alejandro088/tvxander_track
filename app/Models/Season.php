<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'air_date',
        'name',
        'overview',
        'poster_path',
        'season_number',
        'user_id'
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
