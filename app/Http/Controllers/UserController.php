<?php

namespace App\Http\Controllers;

use Tmdb;
use Auth;
use App\Setting;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function settingsStore(Request $request)
    {
        Setting::setLanguage($request->input('language'));
        Setting::setFilterAdult($request->input('adult'));

        return redirect()->back();
    }

    public function myshows()
    {
        $shows = Auth::user()->TvShows;

        return view('myshows', compact('shows'));
    }

    public function unwatched()
    {
        $shows = Auth::user()->TvShows;

        return view('unwatched', compact('shows'));
    }
}
