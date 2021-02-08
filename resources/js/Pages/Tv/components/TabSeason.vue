<template>
    <div id="season" class="tab">
        <v-container>
            <v-row>
                <div
                    class="mvcast-item"
                    v-for="season in $page.props.tv.seasons"
                    :key="season.id"
                >
                    <div >
                        <div class="cast-left series-it">
                            <v-col md="4">
                                <img
                                    :src="
                                        `https://image.tmdb.org/t/p/w300${season.poster_path}`
                                    "
                                    alt=""
                                />
                            </v-col>
                            <v-col md="8">
                                <div class="mv-item-infor">
                                    <a href="#">{{ season.name }}</a>
                                    <p>Espisodes: {{ season.episode_count }}</p>
                                    <p>
                                        {{
                                            season.overview.substring(0, 300)
                                        }}
                                        ...
                                    </p>
                                </div>
                            </v-col>
                        </div>
                    </div>
                </div>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
