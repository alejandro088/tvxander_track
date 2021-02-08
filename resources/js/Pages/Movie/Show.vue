<template>
  <app-layout>
    <div class="hero common-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="hero-ct">
              <h1>Show movie</h1>
              <ul class="breadcumb">
                <li class="active"><a href="#">Home</a></li>
                <li><span class="ion-ios-arrow-right"></span> View details</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-single movie-single movie_single">
      <div class="container">
        <div class="row ipad-width2">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <tv-movie-poster
              :posterPath="$page['props']['movie'].poster_path"
            />
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="movie-single-ct main-content">
              <h1 class="bd-hd">
                {{ $page.props.movie.title }}
                <span>{{ $page.props.movie.release_date }}</span>
              </h1>
              <div class="social-btn">
                <a
                  href="#"
                  v-if="!myMovieFav"
                  class="parent-btn"
                  @click="addToFavs"
                  ><i class="ion-heart"></i> Add to Favorite</a
                >
                <a v-else href="#" class="parent-btn" @click="removeToFavs">
                  <i class="ion-heart"></i> Remove to Favorites
                </a>
                <div class="hover-bnt">
                  <a href="#" class="parent-btn"
                    ><i class="ion-android-share-alt"></i>share</a
                  >
                  <div class="hvr-item">
                    <a href="#" class="hvr-grow"
                      ><i class="ion-social-facebook"></i
                    ></a>
                    <a href="#" class="hvr-grow"
                      ><i class="ion-social-twitter"></i
                    ></a>
                    <a href="#" class="hvr-grow"
                      ><i class="ion-social-googleplus"></i
                    ></a>
                    <a href="#" class="hvr-grow"
                      ><i class="ion-social-youtube"></i
                    ></a>
                  </div>
                </div>
              </div>
              <div class="movie-rate">
                <div class="rate">
                  <i class="ion-android-star"></i>
                  <p>
                    <span>{{ $page["props"]["movie"].vote_average }}</span> /10
                  </p>
                </div>
                <div class="rate-star">
                  <p>Rate This Movie:</p>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star"></i>
                  <i class="ion-ios-star-outline"></i>
                </div>
              </div>
              <div class="movie-tabs">
                <div class="tabs">
                  <ul class="tab-links tabs-mv">
                    <li class="active"><a href="#overview">Overview</a></li>
                    <li><a href="#cast"> Cast & Crew </a></li>
                    <li><a href="#media"> Media</a></li>
                    <li><a href="#moviesrelated"> Related Movies</a></li>
                  </ul>
                  <div class="tab-content">
                    <tab-overview />

                    <tab-cast />

                    <tab-media />

                    <tab-movie-related />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import TabOverview from "./components/TabOverview";
import TabCast from "./components/TabCast";
import TabMedia from "./components/TabMedia";
import TabMovieRelated from "./components/TabMovieRelated";
import TvMoviePoster from "@/Tvxander/TvMoviePoster";

export default {
  components: {
    AppLayout,
    TabOverview,
    TabCast,
    TabMedia,
    TabMovieRelated,
    TvMoviePoster,
  },
  props: ["movie", "isMyMovieFav"],
  data() {
    return {
      myMovieFav: this.isMyMovieFav,
    };
  },
  mounted() {},
  methods: {
    async addToFavs() {
      console.log(this.movie);

      try {
        const response = await window.axios.post(`/dashboard/favorite/movie`, {
          data: this.movie,
        });
        console.log(response);
        this.myMovieFav = true;
      } catch (error) {
        console.log(error);
      }
    },
    removeToFavs() {
      console.log(this.movie);
    },
  },
};
</script>

<style>
</style>