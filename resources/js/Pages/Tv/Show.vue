<template>
    <app-layout>
        
        <source-breadcumb title="Show TV" />

        <div class="page-single movie-single movie_single">
            <div class="container">
                <div class="row ipad-width2">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <tv-movie-poster
                            :posterPath="$page.props.tv.poster_path"
                        />
                        <div v-if="$page.props.providers.results.AR">
                            <div>
                                <div>
                                    <h6>Contenido Disponible en:</h6>
                                    <div
                                        v-for="provider in $page.props.providers
                                            .results.AR.flatrate"
                                        :key="provider.provider_id"
                                    >
                                        <img
                                            :src="
                                                $store.state.dirImagesTmdb
                                                    .base_url +
                                                    $store.state.dirImagesTmdb
                                                        .logo_sizes[1] +
                                                    provider.logo_path
                                            "
                                            alt=""
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="movie-single-ct main-content">
                            <h1 class="bd-hd">
                                {{ $page.props.tv.name }}
                                <span
                                    >{{ $page.props.tv.first_air_date }} -
                                    {{ $page.props.tv.last_air_date }}</span
                                >
                            </h1>

                            <div class="social-btn" v-if="$page.props.user">
                                <a
                                    v-if="!myShowFav"
                                    href="#"
                                    class="parent-btn"
                                    @click="addToFavs"
                                >
                                    <i class="ion-heart"></i> Add to Favorites
                                </a>
                                <a
                                    v-else
                                    href="#"
                                    class="parent-btn"
                                    @click="removeToFavs"
                                >
                                    <i class="ion-heart"></i> Remove to
                                    Favorites
                                </a>
                                <a
                                    v-if="!myShow"
                                    href="#"
                                    class="parent-btn"
                                    @click="addToList"
                                >
                                    <i class="ion-heart"></i> Add to my list
                                </a>
                                <a
                                    v-else
                                    href="#"
                                    class="parent-btn"
                                    @click="removeToList"
                                >
                                    <i class="ion-heart"></i> Remove to my list
                                </a>

                               <btn-share />
                            </div>

                            <div class="movie-rate">
                                <div class="rate">
                                    <i class="ion-android-star"></i>
                                    <p>
                                        <span>{{
                                            $page.props.tv.vote_average
                                        }}</span>
                                        /10
                                    </p>
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
import TabOverview from "./components/TabOverview";
import TabCast from "./components/TabCast";
import TabMedia from "./components/TabMedia";
import TabSeason from "./components/TabSeason";
import TabShowRelated from "./components/TabShowRelated";
import TvMoviePoster from "@/Tvxander/TvMoviePoster";
import TvxanderTabs from "@/Tvxander/TvxanderTabs";
import TvxanderVideoModal from "@/Tvxander/TvxanderVideoModal";
import BtnShare from "@/Tvxander/BtnShare";
import SourceBreadcumb from "@/Tvxander/UserBreadcumb";

export default {
    components: {
        AppLayout,
        TabOverview,
        TabCast,
        TabMedia,
        TabSeason,
        TabShowRelated,
        TvMoviePoster,
        TvxanderTabs,
        TvxanderVideoModal,
        BtnShare,
        SourceBreadcumb
    },
    props: ["tv", "isMyShow", "isMyShowFav"],
    data() {
        return {
            myShow: this.isMyShow,
            myShowFav: this.isMyShowFav,
            videoModal: false,
            ytvideo: {},
            tabs: [
                "Overview",
                "Cast & Crew",
                "Media",
                "Seasons",
                "Related Shows"
            ],
            components: [
                "tab-overview",
                "tab-cast",
                "tab-media",
                "tab-season",
                "tab-show-related"
            ]
        };
    },
    mounted() {},
    methods: {
        openModal(index) {
            console.log(index);
        },
        showVideoModal(video) {
            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        },
        async addToFavs() {
            console.log(this.tv);

            try {
                const response = await window.axios.post(
                    `/dashboard/favorite/tv`,
                    {
                        data: this.tv
                    }
                );
                console.log(response);
                this.myShowFav = true;
            } catch (error) {
                console.log(error);
            }
        },
        async addToList() {
            console.log(this.tv);

            try {
                const response = await window.axios.post(
                    `/tv/${this.tv.id}/add`
                );
                console.log(response);
                this.myShow = true;

                this.$root.$emit("notification", {
                            icon: "success",
                            message:"The show has been added to your list!!"
                        });

            } catch (error) {
                console.log(error);

                this.$root.$emit("notification", {
                            icon: "error",
                            message:"An error has occurred"
                        });
            }
        },
        removeToList() {
            console.log(this.tv);
        },
        removeToFavs() {
            console.log(this.tv);
        }
    }
};
</script>

<style></style>
