<template>
    <div id="media" class="tab">
        <v-container>
            <div class="rv-hd">
                <div>
                    <h3>Videos & Photos of</h3>
                    <h2>{{ $page.props.tv.name }}</h2>
                </div>
            </div>
            <div class="col-12 title-hd-sm">
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

            <div class="col-12 title-hd-sm">
                <h4>Photos <span> ({{ $page.props.images.backdrops + $page.props.images.posters}})</span></h4>
            </div>
            <div class="mvsingle-item">
                <a
                    v-for="image in $page.props.images.backdrops"
                    :key="image.index"
                    class="img-lightbox"
                    data-fancybox-group="gallery"
                    :href="
                        `https://www.themoviedb.org/t/p/w533_and_h300_bestv2${image.file_path}`
                    "
                    ><img
                        :src="
                            `https://www.themoviedb.org/t/p/w100_and_h100_bestv2${image.file_path}`
                        "
                        alt=""
                /></a>
                <a
                    v-for="image in $page.props.images.posters"
                    :key="image.index"
                    class="img-lightbox"
                    data-fancybox-group="gallery"
                    :href="
                        `https://www.themoviedb.org/t/p/w533_and_h300_bestv2${image.file_path}`
                    "
                    ><img
                        :src="
                            `https://www.themoviedb.org/t/p/w100_and_h100_bestv2${image.file_path}`
                        "
                        alt=""
                /></a>
            </div>
        </v-container>
    </div>
</template>

<script>
import TvxanderVideoModal from "@/Tvxander/TvxanderVideoModal";

export default {
    components: {
        TvxanderVideoModal
    },
    data() {
        return {
            videoModal: false,
            ytvideo: ""
        };
    },
    methods: {
        showVideoModal(video) {
            this.ytvideo = video;
            this.videoModal = true;

            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        }
    }
};
</script>

<style></style>
