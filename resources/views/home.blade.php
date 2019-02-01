@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row mt-3">
                <div class="col-md-3">

                    <img src="{{auth()->user()->gravatar}}" class="img-fluid rounded-top rounded-right rounded-bottom rounded-left rounded-circle"
                        alt="">
                </div>
                <div class="col-md-8 p-2 my-2">
                    <p>Has visto {{auth()->user()->episodes_watched}} de {{auth()->user()->total_episodes}} episodios.</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{auth()->user()->episodes_watched * 100 / auth()->user()->total_episodes}}%"
                            aria-valuenow="{{auth()->user()->episodes_watched * 100 / auth()->user()->total_episodes}}"
                            aria-valuemin="0" aria-valuemax="100">{{number_format(auth()->user()->episodes_watched *
                            100 / auth()->user()->total_episodes)}}%
                        </div>
                    </div>
                </div>

            </div>

            <div class="row col-md-12">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item"><router-link class="nav-link" :to="{name: 'all_shows'}">All Shows</router-link></li>
                            <li class="nav-item"><router-link class="nav-link" :to="{name: 'last_episodes'}">Last episodes</router-link></li>
                            <li class="nav-item"><router-link class="nav-link" :to="{name: 'last_shows'}">Last Shows</router-link></li>
                            <li class="nav-item"><router-link class="nav-link" :to="{name: 'all_shows'}">Most views</router-link></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <router-view :key="$route.fullPath"></router-view>

                {{--  <section class="shows-most-views">
                        
                        <h3 class="text-center mt-3">Programas más vistos</h3>
        
                        <div class="row col-md-12">
                            @forelse ($shows->sortBy('name') as $show)
                            <div class="card pt-2 m-2 col-md-auto">
                                {!! $image->getHtml($show->poster_path, 'w154', 154, 231) !!}
                                <div class="card-body">
                                    <p class="card-text"><a href="{{route('tv.show',$show->show)}}">{{$show->name}}</a></p>
                                    <p class="card-text"><small class="text-muted">Episodes watched:
                                            {{$show->episodes_watched}}</small></p>
                                </div>
                            </div>
                            @empty
                            <span>En este momento no tienes Shows registrados</span>
                            @endforelse
                        </div>
                    </section>  --}}

            


        </div>
    </div>
</div>
@endsection
