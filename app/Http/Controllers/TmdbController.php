<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TvXanderTmdb\Client;
use App\Services\TvXanderTmdb\Repositories\MovieRepository;
use Symfony\Component\Console\Input\Input;

class TmdbController extends Controller
{
    public function call(Request $request, ... $args)
    {

        $tmdb = new Client();

        $collection = isset($args[2]) ? $args[2] : null;

        if ($args[0] == 'movie') {
            if (is_numeric($args[1])){

                $items = isset($args[3]) ? $collection . '/' . $args[3] : $collection;

                return $this->movies($tmdb, $args[1], $items, $request->all());

            } else {             
                
                return $this->movies($tmdb, null, $collection, $request->all());
            }
                
        } else {
            return "URL Desconocida";
        }

    }
}
