@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Current Shows</div>

                <div class="card-body">
                    
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
                                <td><a href="{{route('tv.show',$show->show)}}"><strong>{{$show->name}}</strong></a>
                                        <span>
                                                <em class="date d-block">You had {{$show->episodes_unwatched}} unwatched episodes!!
                                                </em>
                                            </span></td>
                                @if ($show->last_episode_to_air != null)
                                <td><span>
                                        <strong class="number">{{$show->last_episode_to_air['season_number'] . "x" .
                                            $show->last_episode_to_air['episode_number'] . "-" .
                                            $show->last_episode_to_air['name']}}</strong>
                                        <em class="date d-block">{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->toFormattedDateString()}}
                                            | <span>{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>

                                @else
                                <td></td>
                                @endif
                                @if ($show->next_episode_to_air != null)
                                <td><span>
                                        <strong class="number">{{$show->next_episode_to_air['season_number'] . "x" .
                                            $show->next_episode_to_air['episode_number'] . "-" .
                                            $show->next_episode_to_air['name']}}</strong>
                                        <em class="date d-block">{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->toFormattedDateString()}}
                                            | <span>{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>

                                @else
                                <td></td>
                                @endif
                                <td>
                                    <form action="/tv/{{$show->show}}/delete" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <form action="/tv/{{$show->id}}/archive" method="post" class="d-inline">
                                        @csrf                                        
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">You do not have current Shows</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Ended Shows</div>

                <div class="card-body">


                    <table class="table table-striped">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Last Episode</th>
                            <th scope="col">Episodes Unwatched</th>
                            <th scope="col">Options</th>
                        </thead>
                        <tbody>
                            @forelse ($endedShows as $show)
                            <tr>
                                <td><a href="{{route('tv.show',$show->show)}}"><strong>{{$show->name}}</strong></a></td>
                                @if ($show->last_episode_to_air != null)
                                <td><span>
                                        <strong class="number">{{$show->last_episode_to_air['season_number'] . "x" .
                                            $show->last_episode_to_air['episode_number'] . "-" .
                                            $show->last_episode_to_air['name']}}</strong>
                                        <em class="date d-block">{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->toFormattedDateString()}}
                                            | <span>{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>

                                @else
                                <td></td>
                                @endif

                                <td>
                                    <span>
                                        <em class="date d-block">You had {{$show->episodes_unwatched}} unwatched episodes!!
                                        </em>
                                    </span>
                                </td>


                                <td>
                                    <form action="/tv/{{$show->show}}/delete" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <form action="/tv/{{$show['id']}}/archive" method="post" class="d-inline">
                                        @csrf                                        
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">You do not have ended Shows</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                    <div class="card-header">Canceled Shows</div>
    
                    <div class="card-body">
    
    
                        <table class="table table-striped">
                            <thead>
                                <th scope="col">Name</th>
                                <th scope="col">Last Episode</th>
                                <th scope="col">Episodes Unwatched</th>
                                <th scope="col">Options</th>
                            </thead>
                            <tbody>
                                @forelse ($canceledShows as $show)
                                <tr>
                                    <td><a href="{{route('tv.show',$show->show)}}"><strong>{{$show->name}}</strong></a></td>
                                    @if ($show->last_episode_to_air != null)
                                    <td><span>
                                            <strong class="number">{{$show->last_episode_to_air['season_number'] . "x" .
                                                $show->last_episode_to_air['episode_number'] . "-" .
                                                $show->last_episode_to_air['name']}}</strong>
                                            <em class="date d-block">{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->toFormattedDateString()}}
                                                | <span>{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>
    
                                    @else
                                    <td></td>
                                    @endif
    
                                    <td>
                                        <span>
                                            <em class="date d-block">You had {{$show->episodes_unwatched}} unwatched episodes!!
                                            </em>
                                        </span>
                                    </td>
    
    
                                    <td>
                                        <form action="/tv/{{$show->show}}/delete" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                        
                                        <form action="/tv/{{$show->id}}/archive" method="post" class="d-inline">
                                            @csrf                                        
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-file"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">You do not have canceled Shows</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            <div class="card mt-3">
                <div class="card-header">Archived Shows</div>

                <div class="card-body">


                    <table class="table table-striped">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Last Episode</th>
                            <th scope="col">Next Episode</th>
                            <th scope="col">Options</th>
                        </thead>
                        <tbody>
                            @forelse ($archivedShows as $show)
                            <tr>
                                <td><a href="{{route('tv.show',$show->show)}}"><strong>{{$show->name}}</strong></a></td>
                                @if ($show->last_episode_to_air != null)
                                <td><span>
                                        <strong class="number">{{$show->last_episode_to_air['season_number'] . "x" .
                                            $show->last_episode_to_air['episode_number'] . "-" .
                                            $show->last_episode_to_air['name']}}</strong>
                                        <em class="date d-block">{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->toFormattedDateString()}}
                                            | <span>{{\Carbon\Carbon::parse($show->last_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>

                                @else
                                <td></td>
                                @endif
                                @if ($show->next_episode_to_air != null)
                                <td><span>
                                        <strong class="number">{{$show->next_episode_to_air['season_number'] . "x" .
                                            $show->next_episode_to_air['episode_number'] . "-" .
                                            $show->next_episode_to_air['name']}}</strong>
                                        <em class="date d-block">{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->toFormattedDateString()}}
                                            | <span>{{\Carbon\Carbon::parse($show->next_episode_to_air['air_date'])->diffForHumans(now())}}</span></em></span></td>

                                @else
                                <td></td>
                                @endif
                                <td>
                                    <form action="/tv/{{$show->show}}/delete" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <form action="/tv/{{$show->id}}/restore" method="post" class="d-inline">
                                        @csrf                                        
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">You do not have archived Shows</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection