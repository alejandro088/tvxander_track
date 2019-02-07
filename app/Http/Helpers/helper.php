<?php

function stars($value)
{
    
    $average = number_format($value / 2);
    $html = '';
    for ($i = 0; $i < $average; $i++)
        $html .= "<i class='fa fa-star'></i>";
    return $html;    
}

function getCredits($creditId)
{
    //\Tmdb\Repository\CreditsRepository $credits;
    return \Tmdb::getCreditsApi()->getCredit($creditId);
    //return \App\Http\Controllers\CreditController::load($creditId);
}