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

    public function action($info, $function, $params = null)
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
            if ($info == 'tv')
                $list = \Tmdb::getTvApi()->$function();
            else if($info == 'movie')
               $list = \Tmdb::getMoviesApi()->$function();            
            else if($info == 'discover')
                $list = \Tmdb::getDiscoverApi()->$function();
            
        }

        //dd($info);

        return view('browse', compact('list'));
    }
}
