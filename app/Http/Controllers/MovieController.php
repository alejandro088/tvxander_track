<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{
    private $movies;

    function __construct(MovieRepository $movies)
    {
        $this->movies = $movies;
    }

    function index()
    {
        // returns information of a movie
        $movies = $this->movies->getPopular();

        return view('welcome', compact('movies'));
    }
}
