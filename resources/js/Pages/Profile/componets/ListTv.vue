<template>
  <div class="card">
    <div class="card-header">Unwatched</div>

    <div class="card-body">
      <v-row>
        <v-col
          v-for="show in shows"
          :key="show.id"
          class="d-flex child-flex"
          cols="auto"
        >
          
            <v-img
        
               v-if="show.episodes_unwatched > 0"
              :src="`https://image.tmdb.org/t/p/w300${show.poster_path}`"
              alt=""
              aspect-ratio="1"
              height="300"
              width="200"
              class="grey lighten-2 show-link"
              :data-id="show.show"
              @click="episodes(show.show)"
            >
              <template v-slot:placeholder>
                <v-row class="fill-height ma-0" align="center" justify="center">
                  <v-progress-circular
                    indeterminate
                    color="grey lighten-5"
                  ></v-progress-circular>
                </v-row>
              </template>
            </v-img>

        </v-col>
      </v-row>

      <span v-if="!shows">En este momento no tienes Shows registrados</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["shows"],
  methods: {
    episodes: function (show) {
      this.$store.dispatch("episodes", show);
    },
  },
};
</script>

<style>
</style>