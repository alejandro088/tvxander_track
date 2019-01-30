Vue.component('tvseason-description', {
    props: ['show', 'season'],
    template: `<div>
            <h2>{{show.name}} - {{season.name}}</h2>
            <p>{{season.overview}}</p>
            </div>

            `,
});

Vue.component('tvseason-mark-watched', {
    props: ['show', 'season'],
    template: `<div class="form-group">
                <span>Marcar temporada como vista?</span>
                <label class="switch">
                    
                    <input type="checkbox" class="success season-watched" v-on:click="setWatchedSeason(season, $event)">
                    <span class="slider round"></span>
            </label>
            </div>

            `,
    methods: {
        setWatchedSeason: async function (season, e) {
            const data = await axios.post(`/season/${season['id']}/watched`, {
                check: e.target.checked
            }, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(response => {

                e.target.classList.add("primary");
                e.target.classList.remove("success");
                e.target.classList.remove("danger");


            }, response => {
                // error callback
                e.target.classList.add("danger");

                e.target.classList.remove("success");

            });
        },
    }
});

Vue.component('tvseason-list-episodes', {
    props: ['show', 'episodes'],
    template: '#list-episodes',
});

Vue.component('tvepisode', {
    props: ['show', 'episode'],
    template: '#item-episode',
    data() {
        return {
            hasError: false,
            isWaiting: true,
            isComplete: false,
        }

    },
    methods: {
        setWatched: function (episode, e) {

            this.isWaiting = true;

            const data = axios.post(`/episode/${episode.id}/watched`, {
                check: e.target.checked
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
    }
});



var vm = new Vue({

    el: '#episodes-list',
    data: {
        loading: false,
        show: {
            show: null,
            seasons: null,
            //episodes: {},

        },
        watched: []
    },
    methods: {
        episodes: function (id) {
            //console.log(id);
            this.show.show = null;
            this.show.seasons = null;
            this.loading = true;

            const data = axios.get(`/shows/${id}`)
                .then(response => {
                    this.show.show = response.data.show;
                    var seasons = Object.assign({}, response.data.seasons);
                    this.show.seasons = seasons;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    this.loading = false;
                });



        },


        update: async function (_evt) {
            var show = this.show.show.show;

            _evt.target.disabled = true;

            const data = await axios.get(`/update/${show}`).then(response => {
                this.show.show = response.data.show;
                //this.show.episodes = response.data.seasons;

                var seasons = Object.assign({}, response.data.seasons);
                //console.log(seasons);
                this.show.seasons = seasons;

                //console.log(response);

            });
        }
    }


})
