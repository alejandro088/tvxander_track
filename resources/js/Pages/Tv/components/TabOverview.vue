<template>
    <div id="overview" class="tab active">
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
            <v-row>
                <v-col cols="12" sm="12" md="8">
                    <p>{{ $page.props.tv.overview }}</p>

                    <div class="title-hd-sm">
                        <h4>Videos & Photos</h4>
                        <a href="#" class="time"
                            >All {{ $page.props.videos.results.length }} Videos
                            &
                            {{
                                $page.props.tv.images.backdrops.length +
                                    $page.props.tv.images.posters.length
                            }}
                            Photos <i class="ion-ios-arrow-right"></i
                        ></a>
                    </div>
                    <div class="mvsingle-item ov-item">
                        <v-row>
                            <v-col
                                v-for="(image, imageIndex) in tv.images
                                    .backdrops"
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
                                        $store.getters.profile_size_w45 +
                                            cast.profile_path
                                    "
                                    alt=""
                                />
                                <inertia-link
                                    :href="route('person.show', cast.id)"
                                    >{{ cast.name }}</inertia-link
                                >
                            </div>
                            <p>... {{ cast.character }}</p>
                        </div>
                    </div>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                    <div class="sb-it">
                        <h6>Director:</h6>
                        <p
                            v-for="director in $page.props.directors"
                            :key="director.index"
                        >
                            <inertia-link
                                :href="route('person.show', director.id)"
                                >{{ director.name }}</inertia-link
                            >
                        </p>
                    </div>
                    <div class="sb-it">
                        <h6>Writer:</h6>
                        <p
                            v-for="writer in $page.props.writers"
                            :key="writer.index"
                        >
                            <inertia-link
                                :href="route('person.show', writer.id)"
                                >{{ writer.name }}</inertia-link
                            >
                        </p>
                    </div>
                    <div class="sb-it">
                        <h6>Stars:</h6>
                        <p>
                            <inertia-link
                                :href="route('person.show', cast.id)"
                                v-for="cast in $page.props.cast"
                                :key="cast.index"
                                >{{ cast.name }},
                            </inertia-link>
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
                                    $store.getters.logo_size_w185 +
                                        network.logo_path
                                "
                                :alt="network.name"
                            />
                        </div>
                    </div>
                </v-col>
            </v-row>
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
            this.ytvideo = video;
            this.videoModal = true;

            this.$store.state.videoModal = true;
            this.$store.state.ytvideo = video;
        }
    }
};
</script>

<style></style>
