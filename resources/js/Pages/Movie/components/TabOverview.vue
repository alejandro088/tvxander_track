<template>
  <div id="overview" class="tab active">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
        <p>{{ $page["props"]["movie"].overview }}</p>
        <div class="title-hd-sm">
          <h4>Videos & Photos</h4>
          <a href="#" class="time"
            >All 5 Videos & 245 Photos <i class="ion-ios-arrow-right"></i
          ></a>
        </div>
        <div class="mvsingle-item ov-item">
          <a
            v-for="image in $page['props']['images'].backdrops"
            :key="image.file_path"
            class="img-lightbox"
            data-fancybox-group="gallery"
            :href="`https://www.themoviedb.org/t/p/w533_and_h300_bestv2${image.file_path}`"
            ><img
              :src="`https://www.themoviedb.org/t/p/w100_and_h100_bestv2${image.file_path}`"
              alt=""
          /></a>
          <a
            v-for="image in $page['props']['images'].posters"
            :key="image.file_path"
            class="img-lightbox"
            data-fancybox-group="gallery"
            :href="`https://www.themoviedb.org/t/p/w533_and_h300_bestv2${image.file_path}`"
            ><img
              :src="`https://www.themoviedb.org/t/p/w100_and_h100_bestv2${image.file_path}`"
              alt=""
          /></a>
          <div
            class="vd-it"
            v-for="video in $page['props']['videos'].results"
            :key="video.key"
          >
            <img
              class="vd-img"
              width="100px"
              height="100px"
              :src="`https://i.ytimg.com/vi/${video.key}/hqdefault.jpg`"
              alt=""
            />
            <a
              class="fancybox-media hvr-grow"
              :href="`https://www.youtube.com/embed/${video.key}`"
              ><img src="/images/uploads/play-vd.png" alt=""
            /></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-12">
        <div class="sb-it">
          <h6>Director:</h6>
          <p
            v-for="director in $page['props']['directors']"
            :key="director.index"
          >
            <a href="#">{{ director.name }}</a>
          </p>
        </div>
        <div class="sb-it">
          <h6>Writer:</h6>
          <p v-for="writer in $page['props']['writers']" :key="writer.index">
            <a href="#">{{ writer.name }}</a>
          </p>
        </div>
        <div class="sb-it">
          <h6>Stars:</h6>
          <p>
            <a href="#" v-for="cast in $page['props']['cast']" :key="cast.index"
              >{{ cast.name }},
            </a>
          </p>
        </div>
        <div class="sb-it">
          <h6>Genres:</h6>

          <p>
            <a
              v-for="genre in $page['props']['movie'].genres"
              :key="genre.id"
              href="#"
              >{{ genre.name }},
            </a>
          </p>
        </div>
        <div class="sb-it">
          <h6>Release Date:</h6>
          <p>{{ $page["props"]["movie"].release_date }}</p>
        </div>
        <div class="sb-it">
          <h6>Run Time:</h6>
          <p>{{ $page["props"]["movie"].runtime }} min</p>
        </div>
        <div class="sb-it">
          <h6>MMPA Rating:</h6>
          <p>PG-13</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>