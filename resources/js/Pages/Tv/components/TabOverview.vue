<template>
    <div id="overview" class="tab active">
        <v-container>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <p>{{ $page.props.tv.overview }}</p>

                <div class="title-hd-sm">
                    <h4>Videos & Photos</h4>
                    <a href="#" class="time"
                        >All {{ $page.props.videos.results.length }} Videos &
                        {{
                            $page.props.images.backdrops.length +
                                $page.props.images.posters.length
                        }}
                        Photos <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <div class="mvsingle-item ov-item">
                    <v-row>
                        <v-col
                            v-for="image in $page.props.images.backdrops"
                            :key="image.file_path"
                            class="d-flex child-flex"
                            cols="4"
                        >
                            <a
                                class="img-lightbox"
                                data-fancybox-group="gallery"
                                :href="
                                    $store.state.dirImagesTmdb.w500 +
                                        image.file_path
                                "
                                ><v-img
                                    :src="
                                        $store.state.dirImagesTmdb.w200 +
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
                            </a>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                            v-for="image in $page.props.images.posters"
                            :key="image.file_path"
                            class="d-flex child-flex"
                            cols="4"
                        >
                            <a
                                class="img-lightbox"
                                data-fancybox-group="gallery"
                                :href="
                                    $store.state.dirImagesTmdb.w500 +
                                        image.file_path
                                "
                                ><v-img
                                    :src="
                                        `https://www.themoviedb.org/t/p/w100_and_h100_bestv2${image.file_path}`
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
                            </a> </v-col
                    ></v-row>

                    <v-divider />

                    <v-row>
                        <v-col
                            v-for="video in $page.props.videos.results"
                            :key="video.key"
                            class="d-flex child-flex"
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
                                    <img
                                        src="/images/uploads/play-vd.png"
                                        alt=""
                                    />
                                </a>
                            </div>
                        </v-col>
                    </v-row>
                </div>
                <div class="title-hd-sm">
                    <h4>cast</h4>
                    <a href="#" class="time"
                        >Full Cast & Crew <i class="ion-ios-arrow-right"></i
                    ></a>
                </div>
                <!-- movie cast -->
                <div class="mvcast-item">
                    <div
                        class="cast-it"
                        v-for="cast in $page.props.cast"
                        :key="cast.index"
                    >
                        <div class="cast-left">
                            <img
                                :src="
                                    $store.state.dirImagesTmdb.h50 +
                                        cast.profile_path
                                "
                                alt=""
                            />
                            <a href="#">{{ cast.name }}</a>
                        </div>
                        <p>... {{ cast.character }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <div class="sb-it">
                    <h6>Director:</h6>
                    <p
                        v-for="director in $page.props.directors"
                        :key="director.index"
                    >
                        <a href="#">{{ director.name }}</a>
                    </p>
                </div>
                <div class="sb-it">
                    <h6>Writer:</h6>
                    <p
                        v-for="writer in $page.props.writers"
                        :key="writer.index"
                    >
                        <a href="#">{{ writer.name }}</a>
                    </p>
                </div>
                <div class="sb-it">
                    <h6>Stars:</h6>
                    <p>
                        <a
                            href="#"
                            v-for="cast in $page.props.cast"
                            :key="cast.index"
                            >{{ cast.name }},
                        </a>
                    </p>
                </div>
                <div class="sb-it">
                    <h6>Genres:</h6>

                    <p>
                        <a
                            v-for="genre in $page.props.tv.genres"
                            :key="genre.id"
                            href="#"
                            >{{ genre.name }},
                        </a>
                    </p>
                </div>
                <div class="sb-it">
                    <h6>Release Date:</h6>
                    <p>{{ $page.props.tv.first_air_date }}</p>
                </div>
                <div class="sb-it">
                    <h6>Canal:</h6>

                    <div
                        v-for="network in $page.props.tv.networks"
                        :key="network.id"
                    >
                        <img
                            :src="
                                $store.state.dirImagesTmdb.h50 +
                                    network.logo_path
                            "
                            :alt="network.name"
                        />
                    </div>
                </div>
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
