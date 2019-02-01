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
            <label class="switch">
                <input type="checkbox" v-model="watched" :class="{primary: isComplete, success: isWaiting, danger: hasError}">
                <span class="slider round"></span>
            </label>

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