<div class="card mt-3">
    <div class="card-header">List</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="content">

            @foreach ($list['results'] as $item)
            <a href="{{route('movie.show',$item['id'])}}">
            {!! $image->getHtml($item['poster_path'], 'w154', null, 200, 'img-thumbnail') !!}
            </a>
            @endforeach

        </div>
    </div>
</div>