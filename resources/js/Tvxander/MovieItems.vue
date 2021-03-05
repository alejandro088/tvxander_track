<template>
    <div class="movie-items full-width">
        <div class="row">
            <div class="col-md-12">
                <div class="title-hd">
                    <h2>in theater</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active">
                            <a
                                href="#tab1-h2"
                                @click="discoverMovies('getDiscover')"
                                >#Discover</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab1-h2"
                                @click="discoverMovies('getPopular')"
                                >#Popular</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab3-h2"
                                @click="discoverMovies('getTopRated')"
                            >
                                #Top rated
                            </a>
                        </li>
                        <li>
                            <a
                                href="#tab4-h2"
                                @click="discoverMovies('getUpcoming')"
                            >
                                #Upcoming</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab4-h2"
                                @click="discoverMovies('getNowPlaying')"
                            >
                                #Now Playing</a
                            >
                        </li>
                    </ul>
                    <div>
                        <div>
                            <swiper :options="swiperOptions">
                                <swiper-slide
                                    v-for="movie in movies"
                                    :key="movie.id"
                                >
                                    <div class="movie-item">
                                        <div class="mv-img">
                                            <img
                                                :src="
                                                    $store.getters
                                                        .poster_size_w154 +
                                                        movie.poster_path
                                                "
                                                alt=""
                                            />
                                        </div>
                                        <div class="hvr-inner">
                                            <inertia-link
                                                :href="
                                                    route('movie.show', {
                                                        id: movie.id
                                                    })
                                                "
                                            >
                                                Read more
                                                <i
                                                    class="ion-android-arrow-dropright"
                                                ></i>
                                            </inertia-link>
                                        </div>
                                        <div class="title-in">
                                            <h6>
                                                <inertia-link href="#">{{
                                                    movie.title
                                                }}</inertia-link>
                                            </h6>
                                            <p>
                                                <i class="ion-android-star"></i
                                                ><span>{{
                                                    movie.vote_average
                                                }}</span>
                                                /10
                                            </p>
                                        </div>
                                    </div>
                                </swiper-slide>

                                <div
                                    class="swiper-pagination"
                                    slot="pagination"
                                ></div>
                                <div class="swiper-scrollbar"></div>
                            </swiper>
                        </div>
                    </div>
                </div>
                <div class="title-hd">
                    <h2>on tv</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active">
                            <a
                                href="#tab21-h2"
                                @click="discoverTv('getDiscover')"
                                >#Discover</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab21-h2"
                                @click="discoverTv('getPopular')"
                                >#Popular</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab23-h2"
                                @click="discoverTv('getTopRated')"
                            >
                                #Top rated
                            </a>
                        </li>
                        <li>
                            <a
                                href="#tab24-h2"
                                @click="discoverTv('getOnTheAir')"
                            >
                                #On The Air</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tab25-h2"
                                @click="discoverTv('getAiringToday')"
                            >
                                #Airing Today</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab active">
                            <div>
                                <swiper :options="swiperOptions">
                                    <swiper-slide
                                        v-for="show in tv"
                                        :key="show.id"
                                    >
                                        <div class="movie-item">
                                            <div class="mv-img">
                                                <img
                                                    :src="
                                                        $store.getters
                                                            .poster_size_w154 +
                                                            show.poster_path
                                                    "
                                                    alt=""
                                                />
                                            </div>
                                            <div class="hvr-inner">
                                                <inertia-link
                                                    :href="
                                                        route('tv.show', {
                                                            id: show.id
                                                        })
                                                    "
                                                >
                                                    Read more
                                                    <i
                                                        class="ion-android-arrow-dropright"
                                                    ></i>
                                                </inertia-link>
                                            </div>
                                            <div class="title-in">
                                                <h6>
                                                    <inertia-link href="#">{{
                                                        show.title
                                                    }}</inertia-link>
                                                </h6>
                                                <p>
                                                    <i
                                                        class="ion-android-star"
                                                    ></i
                                                    ><span>{{
                                                        show.vote_average
                                                    }}</span>
                                                    /10
                                                </p>
                                            </div>
                                        </div>
                                    </swiper-slide>
                                </swiper>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title-hd">
                    <h2>Lo mejor en acción</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.action.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('movie.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>

                <div class="title-hd">
                    <h2>Diviertase con estas comedias</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.comedy.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('movie.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>

                <div class="title-hd">
                    <h2>Disfrute con estos dramas</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.drama.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('movie.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>

                <div class="title-hd">
                    <h2>Sumerjase en el terror</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.terror.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('movie.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>

                <div class="title-hd">
                    <h2>Sci-Fi!!</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.scifi.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('movie.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>

                <div class="title-hd">
                    <h2>Peliculas de suspenso</h2>
                    <a href="#" class="viewall"
                        >View all <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in moviesByGenres.suspense.results" :key="show.id">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img
                                    :src="
                                        $store.getters.poster_size_w154 +
                                            show.poster_path
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="hvr-inner">
                                <inertia-link
                                    :href="
                                        route('tv.show', {
                                            id: show.id
                                        })
                                    "
                                >
                                    Read more
                                    <i class="ion-android-arrow-dropright"></i>
                                </inertia-link>
                            </div>
                            <div class="title-in">
                                <h6>
                                    <inertia-link href="#">{{
                                        show.title
                                    }}</inertia-link>
                                </h6>
                                <p>
                                    <i class="ion-android-star"></i
                                    ><span>{{ show.vote_average }}</span>
                                    /10
                                </p>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from "vue-awesome-swiper";

// import Swiper styles
import "swiper/swiper-bundle.css";

export default {
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            movies: [],
            moviesByGenres: { 
                action: {}, 
                comedy: {},
                drama: {},
                terror: {},
                scifi: {},
                suspense: {}
            },
            tv: [],
            swiperOptions: {
                slidesPerView: 6,
                spaceBetween: 15,
                direction: "horizontal",
                loop: true,
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                scrollbar: {
                    el: ".swiper-scrollbar"
                }
            }
        };
    },
    async mounted() {
        this.discoverMovies("getDiscover");
        this.discoverTv("getDiscover");
        this.discoverByGenres();
    },
    methods: {
        async discoverByGenres() {
            try {
                const response = await window.axios.get(
                    `/api/movies/discoverByGenres`
                );
                this.moviesByGenres = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async discoverMovies(discover) {
            try {
                const response = await window.axios.get(
                    `/api/movies/discover/${discover}`
                );
                this.movies = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async discoverTv(discover) {
            try {
                const response = await window.axios.get(
                    `/api/tv/discover/${discover}`
                );
                this.tv = response.data;
            } catch (error) {
                console.log(error);
            }
        }
    }
};
</script>

<style>
.swiper-slide {
    width: 200px;
}
</style>
