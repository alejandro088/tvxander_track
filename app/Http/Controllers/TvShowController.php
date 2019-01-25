<?php

namespace App\Http\Controllers;

use Auth;
use App\TvShow;
use Illuminate\Http\Request;
use Tmdb\Repository\TvRepository;

class TvShowController extends Controller
{
    
    private $shows;

    function __construct(TvRepository $shows)
    {
        $this->shows = $shows;
    }

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
        $tvshow->archived = false;
        $tvshow->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            $show = TvShow::where('show', $id)->where('user_id', auth()->user()->id);
            
            $show->delete();
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->withErrors($th->getMessage());
        }

        return redirect()->back();        
    }

    public function archive($id)
    {
        try {
            
            $show = TvShow::where('id', $id)->where('user_id', auth()->user()->id)->first();
            
            $show->archived = true;
            $show->save();
            
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors($th->getMessage());
        }

        return redirect()->back();        
    }

    public function list($id)
    {
        $show = \Tmdb::getTvApi()->getTvshow($id);
        
        $seasons = [];
        for ($i=1; $i <= $show['number_of_seasons']; $i++) { 
             $seasons[] = $this->episodesOfSeason($id, $i);
        }

        $tvShow = [ 
            'show' => $show,
            'seasons' => $seasons,
        ];
        return $tvShow;

    }

    public function episodesOfSeason($show, $season)
    {
        $tvShow = \Tmdb::getTvSeasonApi()->getSeason($show, $season);
        return $tvShow;

    }
}
