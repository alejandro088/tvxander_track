<?php

namespace App\Http\Controllers;

use Tmdb;
use Auth;
use App\Setting;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $shows = Auth::user()->TvShows;
        //dump($shows);
        return view('home', compact('shows'));
    }

    public function settings()
    {
        $settings = Setting::where('user_id',Auth::user()->id);
        return view('settings', compact('settings'));
    }

    public function settingsStore()
    {
        
    }
}
