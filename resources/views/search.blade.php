@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('title', " | Result of $query")

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Result of {{$query}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content">
                        
                        @foreach ($movies as $movie)
                            <a href="{{route('tv.show',$movie->getId())}}">
                                {!! $image->getHtml($movie->getPosterImage(), 'w154', null, 200) !!}
                            </a>    
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection