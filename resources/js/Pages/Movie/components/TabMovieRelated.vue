<template>
  <div id="moviesrelated" class="tab">
    <div class="row">
      <h3>Related Movies To</h3>
      <h2>{{ $page["props"]["movie"].title }}</h2>
      <div class="topbar-filter">
        <p>Found <span>12 movies</span> in total</p>
        <label>Sort by:</label>
        <select>
          <option value="popularity">Popularity Descending</option>
          <option value="popularity">Popularity Ascending</option>
          <option value="rating">Rating Descending</option>
          <option value="rating">Rating Ascending</option>
          <option value="date">Release date Descending</option>
          <option value="date">Release date Ascending</option>
        </select>
      </div>
      <div
        class="movie-item-style-2"
        v-for="related in $page['props']['relateds'].results"
        :key="related.index"
      >
        <img
          :src="`https://www.themoviedb.org/t/p/w220_and_h330_face${related.poster_path}`"
          alt=""
        />
        <div class="mv-item-infor">
          <h6>
            <a :href="route('movie.show', { id: related.id })"
              >{{ related.title }}<span>({{ related.release_date }})</span></a
            >
          </h6>
          <p class="rate">
            <i class="ion-android-star"></i
            ><span>{{ related.vote_average }}</span> /10
          </p>
          <p class="describe">{{ related.overview }}</p>
          <p class="run-time">
            Run Time: 2h21’ . <span>MMPA: PG-13 </span> .
            <span>Release: 1 May 2015</span>
          </p>
          <p>Director: <a href="#">Joss Whedon</a></p>
          <p>
            Stars: <a href="#">Robert Downey Jr.,</a>
            <a href="#">Chris Evans,</a> <a href="#"> Chris Hemsworth</a>
          </p>
        </div>
      </div>

      <div class="topbar-filter">
        <label>Movies per page:</label>
        <select>
          <option value="range">5 Movies</option>
          <option value="saab">10 Movies</option>
        </select>
        <div class="pagination2">
          <span>Page 1 of 2:</span>
          <a class="active" href="#">1</a>
          <a href="#">2</a>
          <a href="#"><i class="ion-arrow-right-b"></i></a>
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