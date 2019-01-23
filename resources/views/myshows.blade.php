@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Current Shows</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Last Episode</th>
                            <th scope="col">Next Episode</th>
                            <th scope="col">Options</th>
                        </thead>
                        <tbody>
                    @forelse ($currentShows as $show)
                        <tr>
                            <td>{{$show->name}}</td>
                            <td>{{$show->last_episode_to_air}}</td>
                            @if ($show->next_episode_to_air != null)
                                <td><span>
                                    <strong class="number">{{$show->next_episode_to_air['season_number'] . "x" . $show->next_episode_to_air['episode_number'] . "-" . $show->next_episode_to_air['name']}}</strong>
                                    <em class="date">{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->toFormattedDateString()}} | <span>{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>
                                
                            @endif
                            <td>Options</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">You not have current Shows</td></tr>
                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                    <div class="card-header">Ended Shows</div>
    
                    <div class="card-body">
                        
    
                        @forelse ($endedShows as $show)
                            {{$show}}
                        @empty
                            <span>You not have ended Shows</span>
                        @endforelse
                    </div>
                </div>

                <div class="card mt-3">
                        <div class="card-header">Archived Shows</div>
        
                        <div class="card-body">
                            
        
                            @forelse ($archivedShows as $show)
                                {{$show}}
                            @empty
                                <span>You not have archived Shows</span>
                            @endforelse
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
