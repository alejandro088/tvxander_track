<template>
    <v-card elevation="2" outlined>
        <v-tabs v-model="tabs" color="red" dark>
            <v-tab v-for="title in titles" :key="title" :title="title" active>
                {{ title }}
            </v-tab>
        </v-tabs>

        <v-tabs-items v-model="tabs">
            <v-tab-item v-for="component in components" :key="component">
                <v-card flat>
                    <component :is="component" />
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-card>
</template>

<script>
import TabOverview from "@/Pages/Tv/components/TabOverview";
import TabCast from "@/Pages/Tv/components/TabCast";
import TabMedia from "@/Pages/Tv/components/TabMedia";
import TabSeason from "@/Pages/Tv/components/TabSeason";
import TabShowRelated from "@/Pages/Tv/components/TabShowRelated";

import TabOverviewMovie from "@/Pages/Movie/components/TabOverview";
import TabCastMovie from "@/Pages/Movie/components/TabCast";
import TabMediaMovie from "@/Pages/Movie/components/TabMedia";
import TabMovieRelated from "@/Pages/Movie/components/TabMovieRelated";

export default {
    components: {
        TabOverview,
        TabCast,
        TabMedia,
        TabSeason,
        TabShowRelated,
        TabOverviewMovie,
        TabCastMovie,
        TabMediaMovie,
        TabMovieRelated
    },
    props: ["titles", "components"],
    data() {
        return {
            tabs: null
        };
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
