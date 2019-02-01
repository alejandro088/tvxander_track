<template>

        <div class="container">
            <tvepisode v-for="episode in episodes" 
               v-bind:key="episode.id"
               :episode="episode"
               :initWatched="episode.watched">
            </tvepisode>
        </div>

</template>

<script>
    export default {
        props: ['episodes'],
    }
</script>