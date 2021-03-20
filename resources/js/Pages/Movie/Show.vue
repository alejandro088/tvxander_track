<template>
    <app-layout>
        
        <source-breadcumb title="Show movie" />

        <div class="page-single movie-single movie_single">
            <div class="container">
                <div class="row ipad-width2">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <tv-movie-poster
                            :posterPath="$page.props.movie.poster_path"
                        />
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="movie-single-ct main-content">
                            <h1 class="bd-hd">
                                {{ $page.props.movie.title }}
                                <span>{{
                                    $page.props.movie.release_date
                                }}</span>
                            </h1>
                            <div class="social-btn" v-if="$page.props.user">
                                <a
                                    href="#"
                                    v-if="!myMovieFav"
                                    class="parent-btn"
                                    @click="addToFavs"
                                    ><i class="ion-heart"></i> Add to
                                    Favorite</a
                                >
                                <a
                                    v-else
                                    href="#"
                                    class="parent-btn"
                                    @click="removeToFavs"
                                >
                                    <i class="ion-heart"></i> Remove to
                                    Favorites
                                </a>
                                

                                <btn-share />
                                
                            </div>
                            <div class="movie-rate">
                                <div class="rate">
                                    <i class="ion-android-star"></i>
                                    <p>
                                        <span>{{
                                            $page.props.movie.vote_average
                                        }}</span>
                                        /10
                                    </p>
                                </div>
                                <div class="mx-4">
                                    <h6 class="text-white">Canal:</h6>

                                    <div
                                        v-for="network in $page.props.movie
                                            .networks"
                                        :key="network.id"
                                    >
                                        <img
                                            :src="
                                                $store.state.dirImagesTmdb.h50 +
                                                    network.logo_path
                                            "
                                            :alt="network.name"
                                        />
                                    </div>
                                </div>
                            </div>

                            <tvxander-video-modal
                                :visible="$store.state.videoModal"
                                @close="$store.state.videoModal = false"
                            />

                            <tvxander-tabs
                                :titles="tabs"
                                :components="components"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import TvMoviePoster from "@/Tvxander/TvMoviePoster";
import TvxanderTabs from "@/Tvxander/TvxanderTabs";
import TvxanderVideoModal from "@/Tvxander/TvxanderVideoModal";
import BtnShare from "@/Tvxander/BtnShare";
import SourceBreadcumb from "@/Tvxander/UserBreadcumb";

export default {
    components: {
        AppLayout,
        TvMoviePoster,
        TvxanderTabs,
        TvxanderVideoModal,
        BtnShare,
        SourceBreadcumb
    },
    props: ["movie", "isMyMovieFav"],
    data() {
        return {
            myMovieFav: this.isMyMovieFav,
            tabs: ["Overview", "Cast & Crew", "Media", "Related Movies"],
            components: [
                "tab-overview-movie",
                "tab-cast-movie",
                "tab-media-movie",
                "tab-movie-related"
            ]
        };
    },
    mounted() {},
    methods: {
        async addToFavs() {
            console.log(this.movie);

            try {
                const response = await window.axios.post(
                    `/dashboard/favorite/movie`,
                    {
                        data: this.movie
                    }
                );
                console.log(response);
                this.myMovieFav = true;
                this.$root.$emit("notification", {
                    icon: "success",
                    message: "The movie has been added to your favorites!!"
                });
            } catch (error) {
                console.log(error);
            }
        },
        removeToFavs() {
            console.log(this.movie);
        }
    }
};
</script>

<style></style>
