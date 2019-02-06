<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\PeopleRepository;

class PersonController extends Controller
{
    protected $people;
    
    function __construct(PeopleRepository $people)
    {
        $this->people = $people;
    }
    
    public function show($id)
    {
        //$person = \Tmdb::getPeopleApi()->getPerson($id);

        $person = $this->people->load($id);
        //dd($person);
        return view('person.show', 
            compact('person'));
    }
}
