<!-- Start of Details Widget -->
<aside class="widget widget-movie-details">
    <h3 class="title">Details</h3>

    <ul class="list-unstyled">
        <li><strong>Release date: </strong>{{\Carbon\Carbon::parse($show['release_date'])->toFormattedDateString()}}</li>
        <li><strong>Director: </strong>
            <ul>
                @foreach ($director as $item)
                <li><a href="#">{{$item['name']}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><strong>Budget: </strong>{{number_format($show['budget'] / 1000000)}} million USD</li>
        @if ($show['production_countries'])
        <li><strong>Country: </strong>
            {{$show['production_countries'][0]['name']}}
        </li>
        @endif
        @if ($show['spoken_languages'])
        <li><strong>Language: </strong>
            {{$show['spoken_languages'][0]['name']}}
        </li>
        @endif
        @if ($show['production_companies'])
        <li><strong>Production Co: </strong>
            <ul>
                @foreach ($show['production_companies'] as $item)
                <li><a href="#">{{$item['name']}}</a></li>
                @endforeach
            </ul>
        </li>
        @endif

    </ul>
</aside>
<!-- End of Details Widget -->
