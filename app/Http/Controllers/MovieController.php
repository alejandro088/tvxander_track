<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
        $show = \Tmdb::getMoviesApi()->getMovie($id);

        $cast = \Tmdb::getMoviesApi()->getCredits($id);
        
        $director = array_filter($cast['crew'], function($v, $k) {
            
            return $v['job'] == 'Director';
        }, ARRAY_FILTER_USE_BOTH);
        
        $recommendations = \Tmdb::getMoviesApi()->getRecommendations($id);
        //dd($recommendations);

        return view('movie.show', 
            compact('show', 'cast', 'director', 'recommendations'));
    }
}
