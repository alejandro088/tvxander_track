<template>
    <div class="row border">
        <div class="col-md-2 border ">
            {{episode.episode_number}} - {{episode.name}}
        </div>
        <div class="col-md-2 border ">
            <p>Air Date</p>
            {{episode.air_date}}
        </div>
        <div class="col-md-6 border ">
            {{episode.overview}}
        </div>

        <div class="col-md-2 border ">

            <p class="text-center">Watched?</p>
            

            <md-switch 
                v-model="watched"
                :class="{'md-primary': isComplete, 'md-success': isWaiting, 'md-secondary': hasError}">
            </md-switch>
            

        </div>
    </div>

</template>

<script>
    export default {
        props: ['episode', 'initWatched'],
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
    }
</script>