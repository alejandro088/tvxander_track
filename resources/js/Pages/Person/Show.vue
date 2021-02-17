<template>
    <app-layout>
        <div class="hero common-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-ct">
                            <h1>Show celebrite</h1>
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

        <div class="page-single movie-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="mv-ceb">
                            <v-img
                                :src="
                                    $store.state.dirImagesTmdb.w300 +
                                        $page.props.person.profile_path
                                "
                            />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="movie-single-ct">
                            <h1 class="bd-hd">{{ $page.props.person.name }}</h1>
                            <p class="ceb-single">
                                {{ $page.props.person.known_for_department }}
                            </p>

                            <v-card elevation="2" outlined>
                                <v-tabs v-model="sTabs" color="red" dark>
                                    <v-tab
                                        v-for="title in tabs"
                                        :key="title"
                                        :title="title"
                                        active
                                    >
                                        {{ title }}
                                    </v-tab>
                                </v-tabs>

                                <v-tabs-items v-model="sTabs">
                                    <v-tab-item>
                                        <v-card flat>
                                            <tab-overview />
                                        </v-card>
                                    </v-tab-item>
                                    <v-tab-item>
                                        <v-card flat>
                                            <tab-biography />
                                        </v-card>
                                    </v-tab-item>
                                    <v-tab-item>
                                        <v-card flat>
                                            <tab-media />
                                        </v-card>
                                    </v-tab-item>
                                    <v-tab-item>
                                        <v-card flat>
                                            <tab-filmography />
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
import TvMoviePoster from "@/Tvxander/TvMoviePoster";
import TvxanderVideoModal from "@/Tvxander/TvxanderVideoModal";
import TabOverview from "./components/TabOverview";
import TabMedia from "./components/TabMedia";
import TabBiography from "./components/TabBiography";
import TabFilmography from "./components/TabFilmography";

export default {
    components: {
        AppLayout,
        TvMoviePoster,
        TvxanderVideoModal,
        TabOverview,
        TabMedia,
        TabBiography,
        TabFilmography
    },
    props: ["movie", "isMyMovieFav"],
    data() {
        return {
            sTabs: null,
            tabs: ["Overview", "Biography", "Media", "Filmography"]
        };
    },
    mounted() {},
    methods: {}
};
</script>

<style>
.v-tab {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #abb7c4;
    font-weight: bold;
    text-transform: uppercase;
}

.v-tab {
    font-family: "Dosis", sans-serif;
    font-size: 14px;
    color: #abb7c4;
    font-weight: bold;
    text-transform: uppercase;
}
.v-tab:hover {
    color: #dcf836;
}
.v-tab--active {
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
