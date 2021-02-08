<template>
  <div id="cast" class="tab">
    <div class="row">
      <h3>Cast & Crew of</h3>
      <h2>{{ $page["props"]["movie"].title }}</h2>
      <!-- //== -->
      <div class="col-12 title-hd-sm">
        <h4>Directors & Credit Writers</h4>
      </div>
      <div class="col-12 mvcast-item">
        <div
          class="cast-it"
          v-for="director in $page['props']['directors']"
          :key="director.index"
        >
          <div class="cast-left">
            <h4>JW</h4>
            <a href="#">{{ director.name }}</a>
          </div>
          <p>... {{ director.job }}</p>
        </div>
      </div>
      <!-- //== -->

      <!-- //== -->
      <div class="col-12 title-hd-sm">
        <h4>Cast</h4>
      </div>
      <div class="col-12 mvcast-item">
        <div
          class="cast-it"
          v-for="cast in $page['props']['cast']"
          :key="cast.index"
        >
          <div class="cast-left">
            <img
              :src="`https://www.themoviedb.org/t/p/w50_and_h50_face${cast.profile_path}`"
              alt=""
            />
            <a href="#">{{ cast.name }}</a>
          </div>
          <p>... {{ cast.character }}</p>
        </div>
      </div>
      <!-- //== -->
      <div class="col-12 title-hd-sm">
        <h4>Produced by</h4>
      </div>
      <div class="col-12 mvcast-item">
        <div
          class="cast-it"
          v-for="crew in $page['props']['crew']"
          :key="crew.index"
        >
          <div class="cast-left">
            <h4>VA</h4>
            <a href="#">{{ crew.name }}</a>
          </div>
          <p>... {{ crew.job }}</p>
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