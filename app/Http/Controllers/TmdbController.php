<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TmdbController extends Controller
{
    public function getAiringToday()
    {
        $shows = \Tmdb::getTvApi()->getAiringToday();

        return $shows;
    }

    public function __call($function, $params = null)
    {
        if($params){
            
            $params = explode('&',$params);
        

            foreach ($params as $key => $value) {
                $temp = explode('=',$value);
                $options[$temp[0]] = $temp[1];
            }
            //dd($options);
        
        
            $shows = \Tmdb::getTvApi()->$function($options);
        }
        else {
            $shows = \Tmdb::getTvApi()->$function();
        }

        return $shows;
    }
}
