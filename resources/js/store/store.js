import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        loading: false,
        serie: null,
        seasons: null,
        dirImagesTmdb: {
            base_url: "http://image.tmdb.org/t/p/",
            secure_base_url: "https://image.tmdb.org/t/p/",
            backdrop_sizes: ["w300", "w780", "w1280", "original"],
            logo_sizes: [
                "w45",
                "w92",
                "w154",
                "w185",
                "w300",
                "w500",
                "original"
            ],
            poster_sizes: [
                "w92",
                "w154",
                "w185",
                "w342",
                "w500",
                "w780",
                "original"
            ],
            profile_sizes: ["w45", "w185", "h632", "original"],
            still_sizes: ["w92", "w185", "w300", "original"]
        },
        videoModal: false,
        ytvideo: {},
        player: {}
    },
    getters: {
        backdrop_size_original: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.backdrop_sizes[3];
        },
        backdrop_size_w300: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.backdrop_sizes[0];
        },
        poster_size_original: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.poster_sizes[6];
        },
        poster_size_w92: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.poster_sizes[0];
        },
        poster_size_w154: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.poster_sizes[1];
        },
        profile_size_original: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.profile_sizes[3];
        },
        profile_size_w185: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.profile_sizes[1];
        },
        profile_size_w45: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.profile_sizes[0];
        },
        logo_size_original: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.logo_sizes[3];
        },
        logo_size_w185: state => {
            return  state.dirImagesTmdb.secure_base_url + state.dirImagesTmdb.logo_sizes[3];
        }
    },
    mutations: {
        resetData(state) {
            //state.count++
            state.serie = null;
            state.seasons = null;
            state.loading = true;
        },
        load(state, ok) {
            state.loading = ok;
        },
        loadSeasons(state, seasons) {
            state.seasons = seasons;
        },
        loadSeries(state, series) {
            state.serie = series;
        }
    },
    actions: {
        episodes(context, id) {
            //console.log(id);

            context.commit("resetData");

            window.axios
                .get(`/dashboard/shows/${id}`)
                .then(response => {
                    var seasons = Object.assign({}, response.data.seasons);

                    context.commit("loadSeries", response.data.show);
                    context.commit("loadSeasons", seasons);
                    context.commit("load", true);
                })
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    context.commit("load", false);
                });
        }
    }
});
