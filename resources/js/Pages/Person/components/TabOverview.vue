<template>
    <div id="overviewceb" class="tab active">
        <v-container>
            <v-row>
                <v-col cols="12" sm="12" md="8">
                    <p>{{ $page.props.person.biography }}</p>
                    <p class="time">
                        <a href="#"
                            >See full bio <i class="ion-ios-arrow-right"></i
                        ></a>
                    </p>
                    <div class="title-hd-sm">
                        <h4>Photos</h4>
                        <a href="#" class="time"
                            >{{
                                $page.props.person.images.profiles.length
                            }}
                            Photos <i class="ion-ios-arrow-right"></i
                        ></a>
                    </div>
                    <div class="mvsingle-item ov-item">
                        <v-row>
                            <v-col
                                v-for="image in $page.props.person.images
                                    .profiles"
                                :key="image.file_path"
                                class="d-flex child-flex"
                                cols="4"
                            >
                                <a
                                    class="img-lightbox"
                                    data-fancybox-group="gallery"
                                    :href="
                                        $store.getters.profile_size_original +
                                            image.file_path
                                    "
                                    ><v-img
                                        :src="
                                            $store.getters.profile_size_w185 +
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
                    </div>
                    <div class="title-hd-sm">
                        <h4>filmography</h4>
                        <a href="#" class="time"
                            >Full Filmography<i class="ion-ios-arrow-right"></i
                        ></a>
                    </div>
                    <!-- movie cast -->
                    <div class="mvcast-item">
                        <div
                            class="cast-it"
                            v-for="movieCredit in $page.props.person
                                .movie_credits.cast"
                            :key="movieCredit.id"
                        >
                            <div class="cast-left cebleb-film">
                                <img
                                    :src="
                                        $store.getters.poster_size_w92 +
                                            movieCredit.poster_path
                                    "
                                    alt=""
                                />
                                <div>
                                    <inertia-link
                                        :href="
                                            route('movie.show', movieCredit.id)
                                        "
                                        >{{ movieCredit.title }}
                                    </inertia-link>
                                    <p class="time">
                                        {{ movieCredit.character }}
                                    </p>
                                </div>
                            </div>
                            <p>... {{ movieCredit.release_date }}</p>
                        </div>
                    </div>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                    <div class="sb-it">
                        <h6>Fullname:</h6>
                        <p>
                            {{ $page.props.person.name }}
                        </p>
                    </div>
                    <div class="sb-it">
                        <h6>Date of Birth:</h6>
                        <p>{{ $page.props.person.birthday }}</p>
                    </div>
                    <div class="sb-it">
                        <h6>Country:</h6>
                        <p>{{ $page.props.person.place_of_birth }}</p>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
