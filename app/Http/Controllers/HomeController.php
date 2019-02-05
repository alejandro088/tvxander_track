<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\MovieRepository;
use Tmdb\Repository\TvRepository;

class HomeController extends Controller
{
    private $movies;

    private $shows;

    function __construct(MovieRepository $movies, TvRepository $shows)
    {
        $this->movies = $movies;

        $this->shows = $shows;
    }

    function index()
    {
        // returns information of a movie
        $movies = $this->movies->getPopular(); 
        $shows = $this->shows->getPopular();

        return view('welcome', compact('movies', 'shows'));
    }

    function browse()
    {
        return view('browse');
    }

    public function actionTv($function, $params = null)
    {
        if($params){
            
            $params = explode('&',$params);
        

            foreach ($params as $key => $value) {
                $temp = explode('=',$value);
                $options[$temp[0]] = $temp[1];
            }
            //dd($options);
        
        
            $list = \Tmdb::getTvApi()->$function($options);
        }
        else {
            if ($function == 'discover')
                
                $list = \Tmdb::getDiscoverApi()->discoverTv();
            else 
                $list = \Tmdb::getTvApi()->$function();
                
            
        }

        //dd($info);

        return view('tv.browse', compact('list'));
    }

    public function actionMovie($function, $params = null)
    {
        if($params){
            
            $params = explode('&',$params);
        

            foreach ($params as $key => $value) {
                $temp = explode('=',$value);
                $options[$temp[0]] = $temp[1];
            }
            //dd($options);
        
        
            $list = \Tmdb::getTvApi()->$function($options);
        }
        else {
            if ($function == 'discover')
                
                $list = \Tmdb::getDiscoverApi()->discoverMovies();
            else 
                $list = \Tmdb::getMoviesApi()->$function();
                
            
        }

        return view('movie.browse', compact('list'));
    }
}
