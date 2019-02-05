@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">


            <div class="row col-md-12">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item"><strong>MOVIE</strong></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/movie/discover">Discover</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/movie/getNowPlaying">Now Playing</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/movie/getUpcoming">Upcoming</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/movie/getPopular">Popular</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/movie/getTopRated">Top Rated</a></li>
                        </ul>

                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item"><strong>TV</strong></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/tv/discover">Discover</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/tv/getAiringToday">In Air Today</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/tv/getPopular">Popular</a></li>
                            <li class="nav-item"><a class="nav-link" href="/browse/tv/getTopRated">Top Rated</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <router-view :key="$route.fullPath"></router-view>
            @if (isset($list))
                @includeIf('movie.list', $list)    
            @endif
            

            


        </div>
    </div>
</div>
@endsection
