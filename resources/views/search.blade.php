@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('title', "Result of $query")

@section('content')
<div class="container">
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
                                
                                {!! $image->getHtml($movie->getPosterImage(), 'w154', 260, 420) !!}    
                            @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection