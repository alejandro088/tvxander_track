<template>
    <div id="media" class="tab">
        <v-container>
            <div class="rv-hd">
                <div>
                    <h3>Videos & Photos of</h3>
                    <h2>{{ $page["props"]["tv"].name }}</h2>
                </div>
            </div>
            <div class="col-12 title-hd-sm">
                <h4>Videos <span>(8)</span></h4>
            </div>
            <div class="mvsingle-item media-item">
                <div
                    class="vd-item"
                    v-for="video in $page['props']['videos'].results"
                    :key="video.key"
                >
                    <div class="vd-it">
                        <img
                            class="vd-img"
                            width="170px"
                            height="96px"
                            :src="
                                `https://i.ytimg.com/vi/${video.key}/hqdefault.jpg`
                            "
                            alt=""
                        />
                        <a
                            class="fancybox-media hvr-grow"
                            :href="`https://www.youtube.com/embed/${video.key}`"
                            ><img src="/images/uploads/play-vd.png" alt=""
                        /></a>
                    </div>
                    <div class="vd-infor">
                        <h6>
                            <a href="#">{{ video.name }}</a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-12 title-hd-sm">
                <h4>Photos <span> (21)</span></h4>
            </div>
            <div class="mvsingle-item">
                <a
                    v-for="image in $page['props']['images'].backdrops"
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
                    v-for="image in $page['props']['images'].posters"
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
export default {};
</script>

<style></style>
