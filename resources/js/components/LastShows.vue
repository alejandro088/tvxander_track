<template>

        <section class="last-shows-added">
                   
                    <h3 class="text-center mt-3">Últimos programas añadidos</h3>
    
                    <div class="row col-md-12">
                        
                        <div class="card pt-2 m-2 col-md-auto" v-bind:key="index" v-for="(show, index) in shows">
                            <img :src="'https://image.tmdb.org/t/p/w154'+show.poster_path" class="img-thumbnail" />
                            <div class="card-body">
                                <p class="card-text"><a :href="'/tv/'+show.show">{{show.name}}</a></p>
                                <p class="card-text"><small class="text-muted">Añadido
                                        <span class="date">
                                                {{dateFromNow(show.created_at)}}
                                            </span></small></p>
                            </div>
                        </div>
                        <span v-if="!shows">En este momento no tienes Shows registrados</span>
                    </div>
                </section>
</template>

<script>
import axios from 'axios'
var moment = require('moment');

export default {
    data() {
        return {
            shows: {}
        }
    },
    mounted() {
            axios.get('/tv/last')
                .then(res => {
                    this.shows = res.data;
                    console.log(res.data);
                    
                    
                    
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
    },
    
}
</script>