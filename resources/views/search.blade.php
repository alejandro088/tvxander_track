@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('title', " | Result of $query")

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Result of {{$query}} - {{$find->getTotalResults()}} results founds in {{$find->getTotalPages()}} pages.</div>

                <div class="card-body">
                    

                    <div class="content">

                        @foreach ($find as $item)
                            @include("result.item.".explode('\\',get_class($item))[2])
                        
                        @endforeach

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="search?q={{$request->query('q')}}&page={{$page-1}}" tabindex="-1">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $find->getTotalPages(); $i++)
                                    
                            <li class="page-item"><a class="page-link" href="search?q={{$request->query('q')}}&page={{$i}}">{{$i}}</a></li>
                                @endfor
                                <li class="page-item">
                                <a class="page-link" href="search?q={{$request->query('q')}}&page={{$page+1}}">Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
