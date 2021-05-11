<template>
    <div id="media" class="tab">
        <v-container>
            <CoolLightBox
                :items="tv.images.backdrops"
                :index="backdrops"
                @close="backdrops = null"
            >
            </CoolLightBox>
            <CoolLightBox
                :items="tv.images.posters"
                :index="posters"
                @close="posters = null"
            >
            </CoolLightBox>
            <div class="rv-hd">
                <div>
                    <h3>Videos & Photos of</h3>
                    <h2>{{ $page.props.tv.name }}</h2>
                </div>
            </div>
            <div class="title-hd-sm">
                <h4>
                    Videos
                    <span>({{ $page.props.videos.results.length }})</span>
                </h4>
            </div>

            <v-row class="mvsingle-item media-item">
                <v-col
                    v-for="video in $page.props.videos.results"
                    :key="video.key"
                    class="d-flex child-flex vd-item"
                    cols="4"
                >
                    <div class="vd-it">
                        <img
                            class="vd-img"
                            :src="
                                `https://i.ytimg.com/vi/${video.key}/hqdefault.jpg`
                            "
                            alt=""
                        />

                        <a @click="showVideoModal(video)">
                            <img src="/images/uploads/play-vd.png" alt="" />
                        </a>
                    </div>
                    <div class="vd-infor">
                        <h6>
                            <a href="#">{{ video.name }}</a>
                        </h6>
                    </div>
                </v-col>
            </v-row>

            <div class="title-hd-sm">
                <h4>
                    Photos
                    <span>
                        ({{
                            $page.props.tv.images.backdrops.length +
                                $page.props.tv.images.posters.length
                        }})</span
                    >
                </h4>
            </div>
            <div class="mvsingle-item ov-item">
                <v-row>
                    <v-col
                        v-for="(image, imageIndex) in tv.images.backdrops"
                        :key="image.file_path"
                        @click="backdrops = imageIndex"
                        class="d-flex child-flex"
                        cols="4"
                    >
                        <v-img
                            :src="
                                $store.getters.backdrop_size_w300 +
                                    image.file_path
                            "
                            alt=""
                            aspect-ratio="1"
                            class="grey lighten-2"
                        >
                            <template v-slot:placeholder>
                                <v-row
                                    class="fill-height ma-0"
                                    align="center"
                                    justify="center"
                                >
                                    <v-progress-circular
                                        indeterminate
                                        color="grey lighten-5"
                                    ></v-progress-circular>
                                </v-row>
                            </template>
                        </v-img>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        v-for="(image, imageIndex) in tv.images.posters"
                        :key="image.file_path"
                        @click="posters = imageIndex"
                        class="d-flex child-flex"
                        cols="4"
                    >
                        <v-img
                            :src="
                                $store.getters.poster_size_w154 +
                                    image.file_path
                            "
                            alt=""
                        >
                            <template v-slot:placeholder>
                                <v-row
                                    class="fill-height ma-0"
                                    align="center"
                                    justify="center"
                                >
                                    <v-progress-circular
                                        indeterminate
                                        color="grey lighten-5"
                                    ></v-progress-circular>
                                </v-row>
                            </template>
                        </v-img>
                    </v-col>
                </v-row>
            </div>
        </v-container>
    </div>
</template>

<script>

export default {
    components: { },
    data() {
        return {
            videoModal: false,
            ytvideo: "",
            tv: this.$page.props.tv,
            backdrops: null,
            posters: null
        };
    },
    mounted() {
        this.tv.images.posters.forEach(image => {
            image.src =
                this.$store.getters.poster_size_original + image.file_path;
        });

        this.tv.images.backdrops.forEach(image => {
            image.src =
                this.$store.getters.backdrop_size_original + image.file_path;
        });
    },
    methods: {
        showVideoModal(video) {
            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        }
    }
};
</script>

<style></style>
