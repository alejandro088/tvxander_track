<?php

namespace App\Http\Controllers;

use Auth;
use App\TvShow;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function show($id)
    {
        $show = \Tmdb::getTvApi()->getTvshow($id);

        return view('tv.show', compact('show'));
    }

    private function fieldDataSave($field, $tvshow)
    {
        $tvshow->$field = $show[$field];
    }

    public function store($id)
    {
        $show = \Tmdb::getTvApi()->getTvshow($id);
        
        $tvshow = new TvShow();
        $tvshow->show = $show['id'];
        $tvshow->user_id = Auth::user()->id;
        $tvshow->created_by = $show['created_by'];
        $tvshow->genres = $show['genres'];
        $tvshow->poster_path = $show['poster_path'];
        $tvshow->name = $show['name'] ;
        $tvshow->overview = $show['overview'];
        $tvshow->first_air_date = $show['first_air_date'];
        $tvshow->homepage = $show['homepage'];
        $tvshow->in_production = $show['in_production'];
        $tvshow->last_air_date = $show['last_air_date'];
        $tvshow->next_episode_to_air = $show['next_episode_to_air'];
        $tvshow->last_episode_to_air = $show['last_episode_to_air'];
        $tvshow->number_of_episodes = $show['number_of_episodes'];
        $tvshow->number_of_seasons = $show['number_of_seasons'];
        $tvshow->original_language = $show['original_language'];
        $tvshow->original_name = $show['original_name'];
        $tvshow->popularity_tmdb = $show['popularity'];
        $tvshow->production_companies = $show['production_companies'];
        $tvshow->networks = $show['networks'];
        $tvshow->status = $show['status'];
        $tvshow->save();

        return redirect()->back();
    }
}
