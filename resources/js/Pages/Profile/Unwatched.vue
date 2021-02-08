<template>
  <app-layout>
    <user-breadcumb section="Unwatched" />

    <div class="page-single">
      <div class="container">
        <div class="row ipad-width2">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <profile-sidebar />
          </div>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="text-white  col-md-12">
              <div id="episodes-list">
                <list-tv :shows="shows"/>

                <div
                  class="half-circle-spinner"
                  v-if="loading"
                >
                  <div class="circle circle-1"></div>
                  <div class="circle circle-2"></div>
                </div>

                <v-card
                v-if="$store.state.serie"
                elevation="2"
                outlined
              >

                <v-tabs v-model="tabs">
                  <v-tab
                      :title="`S ${item.season_number}`"
                      v-for="(item, i) in $store.state.seasons"
                      v-bind:key="i"
                      active
                      v-if="item != null"
                    >

                     {{ item.season_number }}
                     
                    </v-tab>
                 
              </v-tabs>

               <v-tabs-items
                  v-model="tabs">
                <v-tab-item v-for="item in $store.state.seasons"
                  :key="item.id"
                >
                  <v-card flat>
                     <tvseason-description
                        v-if="$store.state.serie"
                        :serie="$store.state.serie"
                        :season="item"
                      ></tvseason-description>

                      <tvseason-mark-watched
                        :season="item"
                        v-if="item"
                      ></tvseason-mark-watched>

                      <hr />

                      <tvseason-list-episodes
                        :episodes="item.episodes"
                      ></tvseason-list-episodes>
                  </v-card>
                </v-tab-item>
              </v-tabs-items>
                 
              </v-card>

              

                <div class="row mt-3" v-if="$store.state.serie">
                  <div class="container">
                    <p>
                      <button class="btn btn-danger" @click="update">
                        Refresh data for {{ $store.state.serie.name }}
                      </button>
                    </p>
                    <p>
                      <span class="text-muted"
                        >Si los datos no se encuentran actualizados a TMDB, haz
                        click en el botón de arriba.</span
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProfileSidebar from "@/Tvxander/ProfileSidebar";
import UserBreadcumb from "@/Tvxander/UserBreadcumb";
import { DateTime } from "luxon";
import ListTv from './componets/ListTv';
import TvseasonDescription from './componets/TvseasonDescription';
import TvseasonListEpisodes from './componets/TvseasonListEpisodes';
import TvseasonMarkWatched from './componets/TvseasonMarkWatched';

export default {
  components: {
    AppLayout,
    ProfileSidebar,
    UserBreadcumb,
    ListTv,
    TvseasonDescription,
    TvseasonListEpisodes,
    TvseasonMarkWatched,
  },
  props: ["shows"],
  data() {
    return {
       tabs: null,
      loading: false,
    }
  },
  methods: {
    toJson(json) {
      return JSON.parse(json);
    },
    humanize(date) {
      return DateTime.fromISO(date).setLocale("es").toRelative();
    },
    async showDelete(id) {
      try {
        const response = await window.axios.delete(`/tv/${id}`);
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
    showArchive(id) {},
    update: async function (_evt) {
            var serie = this.$store.state.serie;
            console.log(serie);

            _evt.target.disabled = true;

            const data = await axios.get(`/update/${serie.show}`).then(response => {
                this.$store.serie = response.data.show;
                

                var seasons = Object.assign({}, response.data.seasons);
                
                this.$store.seasons = seasons;

                

            });
        }
  },
};
</script>

<style>
</style>