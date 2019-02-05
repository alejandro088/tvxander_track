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
                    

                    <div class="content">

                        @foreach ($find as $item)
                            @include("result.item.".explode('\\',get_class($item))[2])
                        
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
