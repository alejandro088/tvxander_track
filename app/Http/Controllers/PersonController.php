<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\TvXanderTmdb\Repositories\PeopleRepository;

class PersonController extends Controller
{
    public function show($person)
    {

        $repo = new PeopleRepository($this->client);

        $thePerson = $repo->getPerson($person, [
            'language' => 'es',
            'append_to_response' => 'videos,images,tagged_images,tv_credits,movie_credits',
            'include_image_language' => 'en,null'
        ]);

        return Inertia::render('Person/Show', [
            'person' => $thePerson
        ]);
    }
}
