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
                            
                                @php
                                    $total = $find->getTotalPages();
                                    if($total > 5){
                                        $init = $page;
                                        $end = $page + 5;
                                        if ($end > $total)
                                            $end = $total;
                                        if($total-$page < 2 )
                                            //total = 162, page= 160 diff=2
                                            // page=8, 6 7 8 9 10
                                            $init = $page-(4-($total-$page));
                                        elseif($page <= 2){
                                            //page=1, 1 2 3 4 5 
                                            //page=2, 1 2 3 4 5
                                            $init = 1;
                                            $end = 5;
                                        }
                                        else {
                                            $init = $page - 2;
                                            $end = $page + 2; 
                                        }
                                    } else {
                                        $init = 1;
                                        $end = $total;
                                    }
                                @endphp
                                @if($page != 1 )
                                <li class="page-item">
                                    <a class="page-link" href="search?q={{$request->query('q')}}&page={{$page-1}}" tabindex="-1">Previous</a>
                                </li>
                                @endif
                                @if($init != 1 )
                                <li class="page-item">
                                        <a class="page-link" href="#">...</a>
                                </li>
                                @endif
                                @for ($i = $init; $i <= $end; $i++)                                    
                                    <li class="page-item"><a class="page-link" href="search?q={{$request->query('q')}}&page={{$i}}">{{$i}}</a></li>
                                @endfor
                                @if($end != $total )
                                <li class="page-item">
                                        <a class="page-link" href="#">...</a>
                                </li>
                                @endif
                                @if($page != $total )
                                <li class="page-item">
                                <a class="page-link" href="search?q={{$request->query('q')}}&page={{$page+1}}">Next</a>
                                </li>
                                @endif
                            </ul>
                        </nav>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
