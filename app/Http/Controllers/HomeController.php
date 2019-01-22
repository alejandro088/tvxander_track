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
}
