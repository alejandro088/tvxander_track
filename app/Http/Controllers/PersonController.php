<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function show($person)
    {

        $thePerson = $this->client->getPeopleApi()->getPerson($person);

        $movieCredits = $this->client->getPeopleApi()->getMovieCredits($person);

        $tvCredits = $this->client->getPeopleApi()->getTvCredits($person);

        $images = $this->client->getPeopleApi()->getImages($person);

        $taggedImages = $this->client->getPeopleApi()->getTaggedImages($person); 


        return Inertia::render('Person/Show', [
            'person' => $thePerson,
            'movieCredits' => $movieCredits,
            'tvCredits' => $tvCredits,
            'images' => $images,
            'taggedImages' => $taggedImages,
        ]);
    }
}
