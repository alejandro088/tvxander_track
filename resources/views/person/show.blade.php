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
            <h5>{{$item->getOriginalTitle()}} on {{$item->getReleaseDate() ? date_format($item->getReleaseDate(),'Y') : ''}}</h5>
            <p>Starring as {{$item->getCharacter()}}</p>    
        @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="http://cariera.co/templates/movify/assets/js/owl.carousel.min.js"></script>
@endsection
