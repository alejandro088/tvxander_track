<template>
  <app-layout>
    <div class="hero common-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="hero-ct">
              <h1>Show Tv</h1>
              <ul class="breadcumb">
                <li class="active"><a href="#">Home</a></li>
                <li>
                  <span class="ion-ios-arrow-right"></span>
                  View details
                </li>
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
            <tv-movie-poster :posterPath="$page['props']['tv'].poster_path" />
          </div>
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="movie-single-ct main-content">
              <h1 class="bd-hd">
                {{ $page["props"]["tv"].name }}
                <span
                  >{{ $page["props"]["tv"].first_air_date }} -
                  {{ $page["props"]["tv"].last_air_date }}</span
                >
              </h1>
              <div class="social-btn">
                <a
                  v-if="!myShowFav"
                  href="#"
                  class="parent-btn"
                  @click="addToFavs"
                >
                  <i class="ion-heart"></i> Add to Favorites
                </a>
                <a v-else href="#" class="parent-btn" @click="removeToFavs">
                  <i class="ion-heart"></i> Remove to Favorites
                </a>
                <a
                  v-if="!myShow"
                  href="#"
                  class="parent-btn"
                  @click="addToList"
                >
                  <i class="ion-heart"></i> Add to my list
                </a>
                <a v-else href="#" class="parent-btn" @click="removeToList">
                  <i class="ion-heart"></i> Remove to my list
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
                    <span>{{ $page["props"]["tv"].vote_average }}</span>
                    /10
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
              

              <v-card elevation="2" outlined>
                <v-tabs 
                v-model="tabs"
                color="red"
                dark
                
                >
                  <v-tab
                    
                    title="Overview"
                    active
                  >
                    Overview
                  </v-tab>
                  <v-tab
                    
                    title="Cast & Crew"
                    active
                  >
                    Cast & Crew
                  </v-tab>
                  <v-tab
                    
                    title="Media"
                    active
                  >
                    Media
                  </v-tab>
                  <v-tab
                    
                    title="Seasons"
                    active
                  >
                    Seasons
                  </v-tab>
                  <v-tab
                    
                    title="Related Shows"
                    active
                  >
                    Related Shows
                  </v-tab>
                </v-tabs>

                <v-tabs-items v-model="tabs">
                  <v-tab-item
                   
                  >
                    <v-card class="bg-tab-item" flat >
                      <tab-overview />
                    </v-card>
                  </v-tab-item>
                  <v-tab-item 
                  >
                    <v-card flat>
                      <tab-cast />
                    </v-card>
                  </v-tab-item>
                  <v-tab-item 
                  >
                    <v-card flat>
                       <tab-media />
                    </v-card>
                  </v-tab-item>
                   <v-tab-item 
                  >
                    <v-card flat>
                       <tab-season />
                    </v-card>
                  </v-tab-item>
                   <v-tab-item 
                  >
                    <v-card flat>
                      <tab-show-related />
                    </v-card>
                  </v-tab-item>
                </v-tabs-items>
              </v-card>
              
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
import TabSeason from "./components/TabSeason";
import TabShowRelated from "./components/TabShowRelated";
import TvMoviePoster from "@/Tvxander/TvMoviePoster";

export default {
  components: {
    AppLayout,
    TabOverview,
    TabCast,
    TabMedia,
    TabSeason,
    TabShowRelated,
    TvMoviePoster,
  },
  props: ["tv", "isMyShow", "isMyShowFav"],
  data() {
    return {
      myShow: this.isMyShow,
      myShowFav: this.isMyShowFav,
      tabs: null,
    };
  },
  mounted() {},
  methods: {
    async addToFavs() {
      console.log(this.tv);

      try {
        const response = await window.axios.post(`/dashboard/favorite/tv`, {
          data: this.tv,
        });
        console.log(response);
        this.myShowFav = true;
      } catch (error) {
        console.log(error);
      }
    },
    async addToList() {
      console.log(this.tv);

      try {
        const response = await window.axios.post(`/tv/${this.tv.id}/add`);
        console.log(response);
        this.myShow = true;
      } catch (error) {
        console.log(error);
      }
    },
    removeToList() {
      console.log(this.tv);
    },
    removeToFavs() {
      console.log(this.tv);
    },
  },
};
</script>

<style>
.v-tab {

    font-family: 'Dosis', sans-serif;
    font-size: 14px;
    color: #abb7c4;
    font-weight: bold;
    text-transform: uppercase;
}

.v-tab
 {
    font-family: 'Dosis', sans-serif;
    font-size: 14px;
    color: #abb7c4;
    font-weight: bold;
    text-transform: uppercase;
  }
  .v-tab:hover
   {
    color: #dcf836;
  }
  .v-tab--active
   {
    color: #dcf836;
  }

 .v-tab--active,
  .v-tab:hover {
    border-bottom: 3px solid #dcf836;
  }

.bg-tab-item {
  background: #020d18;
}
</style>
