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

    public function saveShow($id){
        $show = \Tmdb::getTvApi()->getTvshow($id);
        
        $tvshow = \App\TvShow::where('user_id', auth()->user()->id)->where('show', $id)->first();
        
        if(!$tvshow)
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
    }

    public function saveSeasons($id){
        $show = \Tmdb::getTvApi()->getTvshow($id);
        $seasons = $show['seasons'];

        foreach ($seasons as $season) {
            //dd($season);
            $season['_id'] = $season['id'];
            $season['tv_show_id'] = $id;
            //dd($season['_id']);
            $newseason = \App\Season::updateOrCreate(
                ['user_id' => auth()->user()->id,
                '_id' => $season['_id']],
                $season);
            //dd($newseason);
            $this->saveEpisodes($id, $newseason);    
        }
        
        
    }

    public function saveEpisodes($show, $newseason)
    {
        $season = \Tmdb::getTvSeasonApi()->getSeason($show, $newseason->season_number);

        $episodes = $season['episodes'];

        

        foreach ($episodes as $episode) {
            
            $episode['_id'] = $episode['id'];
            $episode['tv_show_id'] = $show;
            //dd($newseason->id);
            $episode['season_id'] = $newseason->id;
            $episode['vote_average_tmdb'] = $episode['vote_average']; 
            $episode['vote_count_tmdb'] = $episode['vote_count'];
            $episode['crew'] = json_encode($episode['crew']); 
            $episode['guest_stars'] = json_encode($episode['guest_stars']); 
            //dd($season['_id']);

            //$showid = TvShow::where('show', $show)->where('user_id', auth()->user()->id)->first();
            //dd($showid->id);
            \App\Episode::updateOrCreate(
                ['user_id' => auth()->user()->id, 
                '_id' => $episode['_id']
                ],
                $episode);
    
        }
    }

    public function store($id)
    {
        
        $this->saveShow($id);
        $this->saveSeasons($id);
        //$this->saveEpisodes($id);

        return redirect()->back();
    }

    public function delete($id)
    {
        try {

            
            $show = TvShow::where('show', $id)->where('user_id', auth()->user()->id);
            
            
            $show->delete();
            
            $deletedRows = \App\Episode::where('tv_show_id', $id)->where('user_id', auth()->user()->id)->delete();
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
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

    public function updateShow($id)
    {
        $this->saveShow($id);
        $this->saveSeasons($id);
        //$this->saveEpisodes($id);

        return $this->list($id);
    }

    

    public function list($id)
    {
        $show = \Tmdb::getTvApi()->getTvshow($id);

        $ushow = \App\TvShow::where('user_id', auth()->user()->id)->where('show', $id)->first();
        //dd($ushow);
        /*$seasons = [];
        for ($i=1; $i <= $ushow->number_of_seasons; $i++) { 
             $seasons[] = $this->episodesOfSeason($id, $i);
        }*/

        $seasons = $this->episodesOfSeason($id, 1);

        $tvShow = [ 
            'show' => $ushow,
            'seasons' => $seasons->toArray(),
        ];

        //dd($tvShow);
        return $tvShow;

    }

    public function episodesOfSeason($show, $season)
    {
        //$tvShow = \Tmdb::getTvSeasonApi()->getSeason($show, $season);
        //return $tvShow;

        $episodes = \App\Season::with('episodes')
            ->where('tv_show_id', $show)
            ->where('user_id', auth()->user()->id)
            //->where('season_number', $season)
            ->whereHas('episodes', function ($query) {
                $query->where('watched', false);
                    //->where('user_id', auth()->user()->id);
            })
            ->get();

        

        
        return $episodes;


    }

    public function setWatched(Request $request, \App\Episode $episode)
    {
        $episode->watched = $request->check;

        
        $episode->save();

        return $episode;
    }

    public function events()
    {
        $shows = auth()->user()->TvShows()->with('episodes')->get();

        $events = [];

        foreach ($shows as $show) {
            $name = $show->name;
            $episodes = $show->episodes->where('air_date','>',now());
            foreach ($episodes as $episode) {
                
                $events[] = [ 
                    'title' => "$name {$episode->season_number}x{$episode->episode_number}",
                    'start' => $episode->air_date,
                    'url' => "/tv/$episode->tv_show_id",
                    'description' => $episode->overview,
                 ];
            }
            
        
        }

        //dd($events);
        return $events;
    }

    public function list_shows($order = 'name', $limit = 10)
    {
        $shows = auth()->user()->TvShows;

        return $shows;
    }

    public function last_shows()
    {

        $shows = TvShow::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        return $shows;
    }
}
