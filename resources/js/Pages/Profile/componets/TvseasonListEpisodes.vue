<template>
    <div class="container">
        <tv-episode
            v-for="episode in episodes"
            v-bind:key="episode.id"
            :episode="episode"
            :initWatched="episode.watched == 1 ? true : false"
        >
        </tv-episode>
    </div>
</template>

<script>
import TvEpisode from "./TvEpisode";
export default {
    props: ["episodes"],
    components: {
        TvEpisode
    }
};
</script>
