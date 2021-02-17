<template>
    <div class="movie-img">
        <img :src="`https://image.tmdb.org/t/p/w300${posterPath}`" alt="" />
        <div class="movie-btn" v-if="$page.props.videos.results.length > 0">
            <div class="btn-transform transform-vertical red">
                <div>
                    <a href="#" class="item item-1 redbtn">
                        <i class="ion-play"></i> Watch Trailer</a
                    >
                </div>
                <div>
                    <a
                        @click="showVideoModal($page.props.videos.results[0])"
                        class="item item-2 redbtn fancybox-media hvr-grow"
                        ><i class="ion-play"></i
                    ></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["posterPath", "videos"],
    methods: {
        showVideoModal(video) {
            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        }
    }
};
</script>

<style>
iframe {
    height: 100% i !important;
}
</style>
