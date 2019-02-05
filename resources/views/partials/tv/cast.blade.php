<h3 class="title">Cast</h3>

        <div class="row">
            
            @foreach ($cast['cast'] as $item)
            <div class="col-md-4">
                    <a href="celebrity-detail.html">
                        <span class="circle-img">
                            <img class="img-thumbnail" style="height: 154px;" src="http://image.tmdb.org/t/p/w154{{$item['profile_path']}}"
                                alt="">
                        </span>
                        <h6 class="name">{{$item['name']}}</h6>
                    </a>
                </div>
            @endforeach
            

        
        </div>