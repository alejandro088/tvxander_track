<template>
    <app-layout>
        <source-breadcumb title="Show celebrite" />

        <div class="page-single movie-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="mv-ceb">
                            <v-img
                                :src="
                                    $store.getters.profile_size_w185 +
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
                                <v-tabs
                                    v-model="sTabs"
                                    color="red"
                                    dark
                                    show-arrows
                                >
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
                                            <tab-overview @change="changeTab" />
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
import TabOverview from "./components/TabOverview";
import TabMedia from "./components/TabMedia";
import TabBiography from "./components/TabBiography";
import TabFilmography from "./components/TabFilmography";

export default {
    components: {
        AppLayout,
        TvMoviePoster,
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
    methods: {
        changeTab(data) {
            this.sTabs = data;
        }
    }
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

.bg-tab-item {
    background: #020d18;
}
</style>
