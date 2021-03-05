<template>
    <div id="cast" class="tab">
        <v-container>
            <h3>Cast & Crew of</h3>
            <h2>{{ $page.props.movie.title }}</h2>
            <!-- //== -->
            <div class="col-12 title-hd-sm">
                <h4>Directors & Credit Writers</h4>
            </div>
            <div class="col-12 mvcast-item">
                <div
                    class="cast-it"
                    v-for="director in $page.props.directors"
                    :key="director.index"
                >
                    <div class="cast-left">
                        <h4>JW</h4>
                        <a href="#">{{ director.name }}</a>
                    </div>
                    <p>... {{ director.job }}</p>
                </div>
            </div>
            <!-- //== -->

            <!-- //== -->
            <div class="col-12 title-hd-sm">
                <h4>Cast</h4>
            </div>
            <div class="col-12 mvcast-item">
                <v-virtual-scroll :items="items" :item-height="50" height="300">
                    <template v-slot:default="{ item }">
                        <v-list-item>
                            <v-list-item-avatar>
                                <v-avatar size="56" class="profile">
                                    <v-img
                                        class="mx-3"
                                        :src="
                                            item.profile_path
                                                ? $store.getters.profile_size_w45 + item.profile_path
                                                : '/images/no-image.png'
                                        "
                                        alt=""
                                    />
                                </v-avatar>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title>
                                    <inertia-link
                                        :href="route('person.show', item.id)"
                                        >{{ item.name }}</inertia-link
                                    >
                                </v-list-item-title>
                            </v-list-item-content>

                            <v-list-item-action>
                                <p>... {{ item.character }}</p>
                            </v-list-item-action>
                        </v-list-item>
                    </template>
                </v-virtual-scroll>
            </div>
            <!-- //== -->
            <div class="col-12 title-hd-sm">
                <h4>Produced by</h4>
            </div>
            <div class="col-12 mvcast-item">
                <v-virtual-scroll
                    :items="$page.props.crew"
                    :item-height="50"
                    height="300"
                >
                    <template v-slot:default="{ item }">
                        <v-list-item>
                            <v-list-item-avatar>
                                <v-avatar size="56" class="profile">
                                    <v-img
                                        class="mx-3"
                                        :src="
                                            item.profile_path
                                                ? $store.getters.profile_size_w45 + item.profile_path
                                                : '/images/no-image.png'
                                        "
                                        alt=""
                                    />
                                </v-avatar>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title>
                                    <inertia-link
                                        :href="route('person.show', item.id)"
                                        >{{ item.name }}</inertia-link
                                    >
                                </v-list-item-title>
                            </v-list-item-content>

                            <v-list-item-action>
                                <p>... {{ item.job }}</p>
                            </v-list-item-action>
                        </v-list-item>
                    </template>
                </v-virtual-scroll>
            </div>
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
