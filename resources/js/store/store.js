import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        
            loading: false,
            serie: null,
            seasons: null,
        
    },
    mutations: {
      resetData (state) {
        //state.count++
        state.serie = null;
        state.seasons = null;
        state.loading = true;
      },
      load (state, ok) {
        state.loading = ok;
      },
      loadSeasons (state, seasons) {
        state.seasons = seasons;
      },
      loadSeries (state, series) {
        state.serie = series;
      },
    },
    actions: {
        setWatched (context, args) {

            this.isWaiting = true;

            const data = axios.post(`/episode/${args.episode.id}/watched`, {
                check: args.checked
            }, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(response => {

                this.isWaiting = false;
                this.isComplete = true;
            }, response => {
                // error callback
                this.hasError = true;

            });

        },
        episodes (context, id) {
            //console.log(id);

            context.commit('resetData');
            

            const data = axios.get(`/shows/${id}`)
                .then(response => {
                    
                    var seasons = Object.assign({}, response.data.seasons);
                    
                    
                    context.commit('loadSeries', response.data.show);
                    context.commit('loadSeasons', seasons);
                    context.commit('load', true);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    context.commit('load', false);
                });



        },
    },
  });