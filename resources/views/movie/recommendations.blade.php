<!-- =============== START OF RECOMMENDED MOVIES SECTION =============== -->
<section class="recommended-movies bg-light ptb100">
    <div class="container">

        <!-- Start of row -->
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="title">Te recomendamos tambien...</h2>
            </div>
        </div>
        <!-- End of row -->


        <!-- Start of Latest Movies Slider -->
        <div class="row owl-carousel recommended-slider mt20">

            @foreach ($recommendations['results'] as $item)
                <div class="owl-item cloned mt-3" style="width: 221.25px; margin-right: 15px;">
                    <div class="item">
                        <!-- Start of Movie Box -->
                        <div class="movie-box-1">

                            <!-- Start of Poster -->
                            <div class="poster">
                                <img src="http://image.tmdb.org/t/p/w154{{$item['poster_path']}}" alt="">
                            </div>
                            <!-- End of Poster -->

                        

                            <!-- Start of Movie Details -->
                            <div class="movie-details">
                                <h4 class="movie-title">
                                    <a href="{{route('movie.show',$item['id'])}}">{{$item['title']}}</a>
                                </h4>
                                <span class="released">{{$item['release_date']}}</span>
                            </div>
                            <!-- End of Movie Details -->

                            <!-- Start of Rating -->
                            <div class="stars">
                                <div class="rating">
                                        @php
                                        $average = number_format($item['vote_average'] / 2);
                                        @endphp
                
                                        @for ($i = 0; $i < $average; $i++) 
                                            <i class="fa fa-star"></i>
                                        @endfor
                                </div>
                                <span>{{$item['vote_average']}} / 10</span>
                            </div>
                            <!-- End of Rating -->

                        </div>
                        <!-- End of Movie Box -->
                    </div>
                </div>                
            @endforeach

        </div>
        <!-- End of Latest Movies Slider -->

    </div>
</section>
<!-- =============== END OF RECOMMENDED MOVIES SECTION =============== -->
