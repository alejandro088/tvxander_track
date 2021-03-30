<template>
    <div id="cast" class="tab">
        <v-container>
            <h3>Cast & Crew of</h3>
            <h2>{{ $page.props.movie.title }}</h2>

            <subtitle-tab>Directors & Credit Writers</subtitle-tab>

            <div class="mvcast-item">
                <div
                    class="cast-it"
                    v-for="director in $page.props.directors"
                    :key="director.index"
                >
                    <div class="cast-left">
                        <v-avatar size="56" class="profile">
                            <v-img
                                class="mx-3"
                                :src="
                                    director.profile_path
                                        ? $store.getters.profile_size_w45 +
                                          director.profile_path
                                        : '/images/no-image.png'
                                "
                                alt=""
                            />
                        </v-avatar>
                        <v-spacer></v-spacer>
                        <a href="#">{{ director.name }}</a>
                    </div>
                    <p>... {{ director.job }}</p>
                </div>
            </div>
            
            <subtitle-tab>Cast</subtitle-tab>

            <cast-list :items="items" itemRoute="person.show"></cast-list>

            <subtitle-tab>Produced by</subtitle-tab>

            <cast-list :items="$page.props.crew" fieldJob="job" itemRoute="person.show"></cast-list>
           
        </v-container>
    </div>
</template>

<script>
export default {
    computed: {
        items() {
            let cast = this.$page.props.cast;

            return cast;
        }
    }
};
</script>

<style></style>
