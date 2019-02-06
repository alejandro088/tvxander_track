<!-- Start of Details Widget -->
<aside class="widget widget-movie-details">
    <h3 class="title">Details</h3>
    

    <ul class="list-unstyled">
    <li><strong>Last air date: </strong>{{\Carbon\Carbon::parse($show['last_air_date'])->toFormattedDateString()}}</li>
        <li><strong>Director: </strong>
            <ul>
                @foreach ($director as $item)
                <li><a href="#">{{$item['name']}}</a></li>
                @endforeach
                </ul>    
        </li>
        
    <li><strong>Country: </strong>{{$show['origin_country'][0]}}</li>
        <li><strong>Language: </strong>{{$show['languages'][0]}}</li>
        <li><strong>Production Co: </strong>
            <ul>
            @foreach ($show['production_companies'] as $item)
            <li><a href="#">{{$item['name']}}</a></li>
            @endforeach
            </ul>
        </li>
            
    </ul>
</aside>
<!-- End of Details Widget -->
