<?php

namespace App\Http\Controllers;

use App\Episode;
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

        $watches = Episode::with('serie', 'season')
            ->where('user_id', auth()->user()->id)
            ->where('watched', true)
            ->orderBy('updated_at', 'DESC')
            ->limit(10)
            ->get();
        
        return $watches;
    }
}
