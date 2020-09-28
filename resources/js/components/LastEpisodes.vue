<template>

        <section class="last-episodes-views">
                
                <h3 class="text-center mt-3">Últimos episodios vistos</h3>

                <div class="row col-md-12">
                    
                    <div class="card pt-2 m-2 col-md-auto"  
                            v-bind:key="index"
                            v-for="(episode, index) in episodes">
                        
                        <img :src="'https://image.tmdb.org/t/p/w154'+episode.serie.poster_path" class="img-thumbnail" />
                        <div class="card-body">
                            <p class="card-text"><a :href="'/tv/'+episode.serie.show">{{episode.serie.name}}</a></p>
                            <p class="card-text"><small class="text-muted">
                                    {{episode.name}} {{episode.season_number}}x{{episode.episode_number}}</small></p>
                                    
                                    <p class="date d-block">
                                        {{dateFormat(episode.updated_at)}}
                                    </p> 
                                    <p class="date d-block">
                                        {{dateFromNow(episode.updated_at)}}
                                    </p>
                                    
                        </div>
                    </div>
                    <span v-if="!episodes">En este momento no tienes Shows registrados</span>
                </div>
            </section>
</template>

<script>
import axios from 'axios'
var moment = require('moment');

export default {
    data() {
        return {
            episodes: {}
        }
    },
    mounted() {
            axios.get('/episodes/all')
                .then(res => {
                    this.episodes = res.data;
                    console.log(this.episodes);                    
                })
                .catch(err => {
                    console.log(err);
                });
    },
    methods: {
        dateFromNow: function(date) {
            return moment(date).fromNow();
        },
        dateFormat: function(date) {
            return moment(date).format("MMM DD, YYYY");
        }
    }
}
</script>