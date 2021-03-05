<template>
    <div class="card">
        <div class="card-body">
            <v-row>
                <swiper :options="swiperOptions">
                    <swiper-slide v-for="show in showsUnwatched" :key="show.id">
                        <v-img
                            :src="
                                $store.getters.poster_size_w154 +
                                    show.poster_path
                            "
                            alt=""
                            aspect-ratio="1"
                            height="300"
                            width="200"
                            class="grey lighten-2 show-link"
                            :data-id="show.show"
                            @click="episodes(show.show)"
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
                    </swiper-slide>
                </swiper>
            </v-row>

            <span v-if="!shows"
                >En este momento no tienes Shows registrados</span
            >
        </div>
    </div>
</template>

<script>
import { Swiper, SwiperSlide } from "vue-awesome-swiper";

// import Swiper styles
import "swiper/swiper-bundle.css";

export default {
     components: {
        Swiper,
        SwiperSlide
    },
    props: ["shows"],
    data() {
        return {
            swiperOptions: {
                slidesPerView: 5,
                spaceBetween: 15,
                direction: "horizontal",
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                scrollbar: {
                    el: ".swiper-scrollbar"
                }
            }
        }
    },
    computed: {
        showsUnwatched() {
            return this.shows.filter(item => {
                if (item.episodes_unwatched > 0) {
                    return item;
                }
            });
        }
    },
    methods: {
        episodes: function(show) {
            this.$store.dispatch("episodes", show);
        }
    }
};
</script>

<style></style>
