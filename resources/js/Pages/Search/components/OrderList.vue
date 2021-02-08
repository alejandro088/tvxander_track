<template>
  <div>
    <div
      class="movie-item-style-2"
      v-for="item in results['movie']"
      :key="item.id"
    >
      <img :src="`https://image.tmdb.org/t/p/w200${item.posterPath}`" alt="" />
      <div class="mv-item-infor">
        <h6>
          <inertia-link :href="route('movie.show', { id: item.id })">
            {{ item.title }} <span>({{ item.releaseDate.date }})</span>
          </inertia-link>
        </h6>
        <p class="rate">
          <i class="ion-android-star"></i>
          <span>{{ item.voteAverage }}</span> /10
        </p>
        <p class="describe">
          {{ item.overview }}
        </p>
        <p class="run-time">
          Run Time: {{ item.runtime }} . <span>MMPA: PG-13 </span> .
          <span>Release: {{ item.releaseDate.date }}</span>
        </p>
      </div>
    </div>

    <div
      class="movie-item-style-2"
      v-for="item in results['tv']"
      :key="item.id"
    >
      <img :src="`https://image.tmdb.org/t/p/w200${item.posterPath}`" alt="" />
      <div class="mv-item-infor">
        <h6>
          <inertia-link :href="route('tv.show', { id: item.id })">
            {{ item.title }} <span>({{ item.firstAirDate.date }})</span>
          </inertia-link>
        </h6>
        <p class="rate">
          <i class="ion-android-star"></i
          ><span>{{ item.voteAverage }}</span> /10
        </p>
        <p class="describe">
          {{ item.overview }}
        </p>
        <p class="run-time">
          Run Time: {{ item.runtime }} . <span>MMPA: PG-13 </span> .
          <span>Release: {{ item.firstAirDate.date }}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ["results", "query"],
};
</script>

<style>
</style>