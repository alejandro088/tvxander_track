<template>
  <div>
    

    <v-container fluid>
    
        <md-switch v-model="isWatched" @change="setWatchedSeason(season, $event)"><span>Marcar temporada como vista?</span></md-switch>

    </v-container>

         
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["season"],
  data(){
      return {
        isWatched: false,
        ex11: false,
      }
  },
  methods: {
    setWatchedSeason: async function (season, e) {
        console.log(this.isWatched);
      const data = await axios
        .post(
          `/dashboard/season/${season["id"]}/watched`,
          {
            check: this.isWatched,
          },
          {
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          }
        )
        .then(
          (response) => {
            e.target.classList.add("primary");
            e.target.classList.remove("success");
            e.target.classList.remove("danger");
          },
          (response) => {
            // error callback
            e.target.classList.add("danger");

            e.target.classList.remove("success");
          }
        );
    },
  },
};
</script>