<template>
    <div id="cast" class="tab">
        <v-layout>
            <v-container>
                <v-row>
                    <v-col>
                        <h3>Cast & Crew of</h3>
                        <h2>{{ $page.props.tv.name }}</h2>
                        <!-- //== -->

                        <div class="title-hd-sm">
                            <h4>Directors & Credit Writers</h4>
                        </div>
                        <div class="mvcast-item">
                            <div
                                class="cast-it"
                                v-for="director in $page.props.directors"
                                :key="director.index"
                            >
                                <div class="cast-left">
                                    <img
                                        :src="
                                            $store.getters.profile_size_w45 +
                                                director.profile_path
                                        "
                                        alt=""
                                    />
                                    <inertia-link :href="route('person.show', director.id)">{{ director.name }}</inertia-link>
                                </div>
                                <p>... {{ director.job }}</p>
                            </div>
                        </div>

                        <!-- //== -->

                        <div class="title-hd-sm">
                            <h4>Cast</h4>
                        </div>

                        <div class="mvcast-item">
                            <div
                                class="cast-it"
                                v-for="cast in $page.props.cast"
                                :key="cast.index"
                            >
                                <div class="cast-left">
                                    <img
                                        :src="
                                            $store.getters.profile_size_w45 +
                                                cast.profile_path
                                        "
                                        alt=""
                                    />
                                    <inertia-link :href="route('person.show', cast.id)">{{ cast.name }}</inertia-link>
                                </div>
                                <p>... {{ cast.character }}</p>
                            </div>
                        </div>

                        <!-- //== -->
                        <div class="title-hd-sm">
                            <h4>Produced by</h4>
                        </div>

                        <div class="mvcast-item">
                            <div
                                class="cast-it"
                                v-for="crew in $page.props.crew"
                                :key="crew.index"
                            >
                                <div class="cast-left">
                                    <img
                                        :src="
                                            $store.getters.profile_size_w45 +
                                                crew.profile_path
                                        "
                                        alt=""
                                    />
                                    <inertia-link :href="route('person.show', crew.id)">{{ crew.name }}</inertia-link>
                                </div>
                                <p>... {{ crew.job }}</p>
                            </div>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-layout>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
