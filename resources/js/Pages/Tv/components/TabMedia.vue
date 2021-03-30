<template>
    <div id="media" class="tab">
        <v-container>
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
                <h4>Photos <span> ({{ $page.props.tv.images.backdrops.length + $page.props.tv.images.posters.length}})</span></h4>
            </div>
            <div class="mvsingle-item">
                <a
                    v-for="image in $page.props.tv.images.backdrops"
                    :key="image.index"
                    class="img-lightbox"
                    data-fancybox-group="gallery"
                    :href="
                        $store.getters.backdrop_size_original + image.file_path
                    "
                    ><img
                        :src="
                            $store.getters.backdrop_size_w300 + image.file_path
                        "
                        alt=""
                /></a>
                <a
                    v-for="image in $page.props.tv.images.posters"
                    :key="image.index"
                    class="img-lightbox"
                    data-fancybox-group="gallery"
                    :href="
                        $store.getters.poster_size_original + image.file_path
                    "
                    ><img
                        :src="
                             $store.getters.poster_size_w154 + image.file_path
                        "
                        alt=""
                /></a>
            </div>
        </v-container>
    </div>
</template>

<script>

export default {
    components: {
    },
    data() {
        return {
            videoModal: false,
            ytvideo: ""
        };
    },
    mounted() {
        //== js for image lightbox
        var imglightbox = $(".img-lightbox");
        imglightbox.fancybox({
            helpers: {
                title: {
                    type: "float"
                },
                overlay: {
                    locked: false
                }
            }
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
