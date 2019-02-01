<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EpisodeTvController extends Controller
{
    public function show($show, $season)
    {
        $season = \Tmdb::getTvSeasonApi()->getSeason($show, $season);

        return $season;
    }

    public function setWatchedSeason(Request $request, $seasonid)
    {
        $episodes = \App\Episode::where('season_id', $seasonid)
                ->update(['watched' => $request->check]);

        return $episodes;
    }

    public function list()
    {
        $shows = auth()->user()->episodes()->with('serie')->get();

        return $shows;
    }

    public function watches()
    {
        $watches = $this->list()
            ->where('watched', true)
            ->sortByDesc('updated_at')
            ->take(10);
        
        return $watches;
    }
}
