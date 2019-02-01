@inject('image', 'Tmdb\Helper\ImageHelper')

<!-- =============== START OF MOVIE DETAIL INTRO =============== -->
<section class="movie-detail-intro overlay-gradient ptb100" style="background: url('https://image.tmdb.org/t/p/original{{$show['poster_path']}}');">
</section>

<!-- =============== START OF MOVIE DETAIL INTRO 2 =============== -->
<section class="movie-detail-intro2">

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">

                <div class="movie-poster">

                    {!! $image->getHtml($show['poster_path'], 'w154', '200px', '420px', 'image') !!}

                </div>


                <div class="movie-details">
                    <h3 class="title">{{$show['original_name']}}</h3>

                    <ul class="movie-subtext">
                        <li>
                            @foreach ($show['genres'] as $item)
                            {{$item['name']}},
                            @endforeach
                        </li>
                        <li>{{$show['first_air_date']}}</li>

                    </ul>

                    <ul class="movie-subtext">
                        <li>{{$show['number_of_episodes']}} episodes</li>
                        <li>{{$show['number_of_seasons']}} seasons</li>
                    </ul>

                    Status: {{$show['status']}}


                    @auth

                    @if(auth()->user()->hasShow($show['id']))
                    <form action="/tv/{{$show['id']}}/delete" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    @else
                    <form action="/tv/{{$show['id']}}/add" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fa fa-heart"></i></button>
                    </form>
                    @endif

                    @endauth

                    <div class="rating mt10">
                        
                        @php
                            $average = number_format($show['vote_average'] / 2);
                        @endphp
                        
                        @for ($i = 0; $i < $average; $i++)
                            <i class="fa fa-star"></i>
                        @endfor                      
                        
                        
                        <span>{{$show['vote_count']}} Votes</span>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

    </div>
</section>

<!-- =============== End OF MOVIE DETAIL INTRO 2 =============== -->

<div class="storyline">
    <h3 class="title">Overview</h3>

    <p>{{$show['overview']}}</p>
</div>
