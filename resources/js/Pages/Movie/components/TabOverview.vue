<template>
    <div id="overview" class="tab active">
        <v-container>
            <v-row>
                <v-col cols="12" sm="12" md="8">
                    <p>{{ $page.props.movie.overview }}</p>

                    <div class="title-hd-sm">
                        <h4>Videos & Photos</h4>
                        <a href="#" class="time"
                            >All {{ $page.props.videos.results.length }} Videos
                            &
                            {{
                                $page.props.movie.images.backdrops.length +
                                    $page.props.movie.images.posters.length
                            }}
                            Photos <i class="ion-ios-arrow-right"></i
                        ></a>
                    </div>
                    <div class="mvsingle-item ov-item">
                        <v-row>
                            <v-col
                                v-for="image in $page.props.movie.images
                                    .backdrops"
                                :key="image.file_path"
                                class="d-flex child-flex"
                                cols="4"
                            >
                                <a
                                    class="img-lightbox"
                                    data-fancybox-group="gallery"
                                    :href="
                                        $store.getters.backdrop_size_original +
                                            image.file_path
                                    "
                                    ><v-img
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
                                </a>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col
                                v-for="image in $page.props.movie.images
                                    .posters"
                                :key="image.file_path"
                                class="d-flex child-flex"
                                cols="4"
                            >
                                <a
                                    class="img-lightbox"
                                    data-fancybox-group="gallery"
                                    :href="
                                        $store.getters.poster_size_original +
                                            image.file_path
                                    "
                                    ><v-img
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
                                </a> </v-col
                        ></v-row>

                        <v-divider />

                        <v-row class="my-3">
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
                        <h4>Cast</h4>
                        <a @click="$emit('change', 1)" class="time"
                            >Full Cast & Crew <i class="ion-ios-arrow-right"></i
                        ></a>
                    </div>
                    
                    <cast-list :items="$page.props.cast" itemRoute="person.show"></cast-list>
                   
                </v-col>

                <v-col cols="12" sm="12" md="4">
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
                        <h6>Release Date:</h6>
                        <p>{{ $page.props.movie.release_date }}</p>
                    </div>
                    <div class="sb-it">
                        <h6>Runtime:</h6>
                        <p>{{ $page.props.movie.runtime }} mins.</p>
                    </div>
                    <div class="sb-it">
                        <h6>Genres:</h6>

                        <p>
                            <a
                                v-for="genre in $page.props.movie.genres"
                                :key="genre.id"
                                href="#"
                                >{{ genre.name }},
                            </a>
                        </p>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    methods: {
        showVideoModal(video) {
            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        }
    }
};
</script>

<style></style>
