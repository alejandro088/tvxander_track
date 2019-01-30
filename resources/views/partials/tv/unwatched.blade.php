<div class="card">
        <div class="card-header">Unwatched</div>

        <div class="card-body">
            

            @forelse ($shows as $show)
            @if ($show->episodes_unwatched > 0)                            
            <a href="#" class="show-link" data-id="{{$show->show}}" v-on:click="episodes({{$show->show}})">
                {!! $image->getHtml($show->poster_path, 'w154', null, 200, "img-thumbail m-1") !!}
            </a>
            @endif
            @empty
            <span>En este momento no tienes Shows registrados</span>
            @endforelse

        </div>
    </div>