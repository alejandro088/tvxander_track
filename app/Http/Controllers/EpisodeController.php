<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function setWatchedSeason(Request $request, $seasonid)
    {
        return Episode::where('season_id', $seasonid)
                ->update(['watched' => $request->check]);
    }

    public function setWatched(Request $request, Episode $episode)
    {
        $episode->watched = $request->check;
        $episode->save();

        return $episode;
    }
}
