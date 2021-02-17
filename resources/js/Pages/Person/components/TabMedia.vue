<template>
    <div id="mediaceb" class="tab">
        <v-container>
            <div class="rv-hd">
                <div>
                    <h3>Biography of</h3>
                    <h2>{{ $page.props.person.name }}</h2>
                </div>
            </div>
            <div class="title-hd-sm">
                <h4>
                    Profile Images
                    <span>({{ $page.props.images.profiles.length }})</span>
                </h4>
            </div>
            <div class="mvsingle-item">
                <v-row>
                    <v-col
                        v-for="image in $page.props.images.profiles"
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
            </div>
            <div class="title-hd-sm">
                <h4>
                    Tagged Images
                    <span>
                        ({{ $page.props.taggedImages.results.length }})</span
                    >
                </h4>
            </div>
            <div class="mvsingle-item">
                <v-row>
                    <v-col
                        v-for="image in $page.props.taggedImages.results"
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
            </div>
        </v-container>
    </div>
</template>

<script>
export default {
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
    }
};
</script>

<style></style>
