Vue.component('tvseason-description', {
    props: ['serie', 'season'],
    template: `<div>
            <h2>{{serie.name}} - {{season.name}}</h2>
            <p>{{season.overview}}</p>
            </div>

            `,
});

Vue.component('tvseason-mark-watched', {
    props: ['season'],
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
    props: ['episodes'],
    template: '#list-episodes',
});



Vue.component('tvepisode', {
    props: ['episode', 'initWatched'],
    template: '#item-episode',
    data() {
        return {
            hasError: false,
            isWaiting: true,
            isComplete: false,
            watched: this.initWatched,
        }

    },
    beforeUpdate() {
        
        this.$store.dispatch('setWatched', {
            episode: this.episode,
            checked: this.watched
        })
    }
});
