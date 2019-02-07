@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/tv_details.css">
@endsection

@section('content')
<div class="show mt-4">
    <!-- content here -->
    <div class="row">
        
        <div class="col-md-4">
            
            <span class="circle-img">
                    <img class="img-thumbnail" style="height: 350px;" src="http://image.tmdb.org/t/p/w154{{$person->getProfileImage()}}"
                        alt="">
                </span>
        </div>
        <div class="col-md-8">
            <h4>{{$person->getName()}}</h4>
            
            <p>Birthdate: {{date_format($person->getBirthday(), 'Y, M d')}}</p>
            <p>Born in: {{$person->getPlaceOfBirth()}}</p>
            <p>HomePage: {{$person->getHomepage()}}</p>
            <p>{{$person->getBiography()}}</p>
        </div>
    </div>
    <div class="row">
        <h5>Known for</h5>
        
        @foreach ($person->getKnownFor() as $item)
                {{dd($item)}}    
        @endforeach
    </div>
    <div class="row">
        <h5>Credits</h5>
    </div>
    <div class="row">
        <div class="container">
        <h6>Cast credits</h6>

        
        @foreach ($person->getCombinedCredits()->cast as $item)
        
            
            @if($item->getMediaType() == 'movie')
            <h5><a href="{{route('movie.show', $item->getId())}}">{{$item->getOriginalTitle()}}</a> on {{$item->getReleaseDate() ? date_format($item->getReleaseDate(),'Y') : ''}}</h5>
            <p>Starring as {{$item->getCharacter()}}</p>
            @elseif($item->getMediaType() == 'tv')
            
            <h5><a href="{{route('tv.show', $item->getId())}}">{{$item->getOriginalName()}}</a> on 
                    {{\Carbon\Carbon::parse($item->getFirstAirDate())->toFormattedDateString()}}
            </h5>
            <p>Starring as {{$item->getCharacter()}} - ({{$item->getEpisodeCount()}} episodes)</p>
            @php 
            $credits = getCredits($item->getCreditId());
            //dd($credits);
            @endphp
            @foreach ($credits['media']['episodes'] as $episode)
                <p>Episode: {{$episode['season_number']}}x{{$episode['episode_number']}}</p>
            @endforeach
            
            
            @endif
        @endforeach
        </div>
    </div>
</div>
@endsection