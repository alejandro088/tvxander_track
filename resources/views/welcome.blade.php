@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card mt-3">
                <div class="card-header"><h3>Welcome!!</h3></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="content">

                        <p>¿Sos fanático de las series? No lo dudes más, !éste es tu lugar!!</p>
                        <p>Aquí puedes agendar tus series favoritas, conocer cuando se emitirá el próximo episodio, 
                            también puedes realizar un seguimiento de tus series para conocer cuantos
                            episodios te faltan por ver y mucho más...
                        </p>
                        <p>Solamente tienes que crearte una cuenta y comenzar a añadir tus series a tu lista.</p>

                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Popular Movies</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="content">

                        @foreach ($movies as $movie)
                        <a href="{{route('movie.show',$show->getId())}}">
                        {!! $image->getHtml($movie->getPosterImage(), 'w154', null, 200, 'img-thumbnail') !!}
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Popular Shows</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="content">

                        @foreach ($shows as $show)
                        <a href="{{route('tv.show',$show->getId())}}">
                            {!! $image->getHtml($show->getPosterImage(), 'w154', null, 200, 'img-thumbnail') !!}
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
