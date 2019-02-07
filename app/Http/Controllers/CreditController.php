<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\CreditsRepository;

class CreditController extends Controller
{
    protected $credits;
    
    function __construct(CreditsRepository $credits)
    {
        $this->credits = $credits;
    }

    public function load($id){
        return $this->credits->load($id);
    }
}
