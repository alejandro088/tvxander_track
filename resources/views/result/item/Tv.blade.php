<a href="{{route('tv.show',$item->getId())}}">
        {!! $image->getHtml($item->getPosterImage(), 'w154', null, 200) !!}
</a>