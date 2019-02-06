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
                    <h3 class="title">{{$show['title']}}</h3>

                    <ul class="movie-subtext">
                        <li>
                            @foreach ($show['genres'] as $item)
                            {{$item['name']}},
                            @endforeach
                        </li>
                        <li>{{\Carbon\Carbon::parse($show['release_date'])->toFormattedDateString()}}</li>

                    </ul>

                    Status: {{$show['status']}}

                    <div class="rating mt10">

                            {!!stars($show['vote_average'])!!}


                            <span>{{$show['vote_count']}} Votes</span>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>

    </div>
</section>

<!-- =============== End OF MOVIE DETAIL INTRO 2 =============== -->
<div class="row">
    <div class="col-md-8">
        <div class="storyline mt-4">


            <h3 class="title">Overview</h3>

            <p>{{$show['overview']}}</p>
        </div>

        @include('partials.tv.cast')


    </div>
    <div class="col-md-4">
        @include('movie.widget.info')
    </div>
</div>

@include('movie.recommendations')