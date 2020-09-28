<template>
     <section class="all-shows">
                <!-- order by name  -->
                <h3 class="text-center mt-3">Todos los programas añadidos ({{shows.length}})</h3>

                <div class="row col-md-12">
                    
                    <div class="card pt-2 m-2 col-md-auto" v-bind:key="index" v-for="(show, index) in shows">
                         <!-- $image->getHtml($show->poster_path, 'w154', 154, 231) -->
                        <img :src="'https://image.tmdb.org/t/p/w154'+show.poster_path" class="img-thumbnail" />
                        <div class="card-body">
                            <p class="card-text"><a :href="'/tv/'+show.show">{{show.name}}</a></p>
                            <p class="card-text"><small class="text-muted">Episodes watched:
                                    {{show.episodes_watched}}</small></p>
                        </div>
                    </div>
                    
                    <span v-if="!shows">En este momento no tienes Shows registrados</span>
                    
                </div>
            </section>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            shows: {}
        }
    },
    mounted() {
            axios.get('/tv/all')
                .then(res => {
                    this.shows = res.data;
                    console.log(this.shows);                    
                })
                .catch(err => {
                    console.log(err);
                });
        }
}
</script>
