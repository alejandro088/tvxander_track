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
                            <li class="nav-item"><a class="nav-link" href="#">All shows</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Last episodes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Last Shows</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Most views</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <section class="all-shows">
                {{--order by name --}}
                <h3 class="text-center mt-3">Todos los programas añadidos ({{$shows->count()}})</h3>

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
            </section>

            <section class="last-episodes-views">
                {{--order by updated_at --}}

                
                <h3 class="text-center mt-3">Últimos episodios vistos</h3>

                <div class="row col-md-12">
                        
                    @forelse ($episodes->where('watched', true)->sortByDesc('updated_at')->take(15) as $episode)
                    
                    <div class="card pt-2 m-2 col-md-auto">
                        {!! $image->getHtml($episode->serie->poster_path, 'w154', 154, 231) !!}
                        <div class="card-body">
                            <p class="card-text"><a href="{{route('tv.show',$episode->serie->show)}}">{{$episode->serie->name}}</a></p>
                            <p class="card-text"><small class="text-muted">
                                    {{$episode->name}} {{$episode->season_number}}x{{$episode->episode_number}}</small></p>
                                    
                                    <p class="date d-block">
                                        {{\Carbon\Carbon::parse($episode->updated_at)->toFormattedDateString()}}
                                    </p> 
                                    <p class="date d-block">
                                        {{\Carbon\Carbon::parse($episode->updated_at)->diffForHumans(now())}}
                                    </p>
                                    
                        </div>
                    </div>
                    @empty
                    <span>En este momento no tienes Shows registrados</span>
                    @endforelse
                </div>
            </section>

            <section class="last-shows-added">
                    {{--order by name --}}
                    <h3 class="text-center mt-3">Últimos programas añadidos</h3>
    
                    <div class="row col-md-12">
                        @forelse ($shows->sortByDesc('created_at') as $show)
                        <div class="card pt-2 m-2 col-md-auto">
                            {!! $image->getHtml($show->poster_path, 'w154', 154, 231) !!}
                            <div class="card-body">
                                <p class="card-text"><a href="{{route('tv.show',$show->show)}}">{{$show->name}}</a></p>
                                <p class="card-text"><small class="text-muted">Añadido
                                        <span class="date">
                                                {{\Carbon\Carbon::parse($show->created_at)->diffForHumans(now())}}
                                            </span></small></p>
                            </div>
                        </div>
                        @empty
                        <span>En este momento no tienes Shows registrados</span>
                        @endforelse
                    </div>
                </section>

                <section class="shows-most-views">
                        {{--order by time --}}
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
                    </section>

            


        </div>
    </div>
</div>
@endsection
