<template>
    <div id="filmography" class="tab">
        <v-container>
            <div class="rv-hd">
                <div>
                    <h3>Filmography of</h3>
                    <h2>{{ $page.props.person.name }}</h2>
                </div>
            </div>
            <div class="topbar-filter">
                <p>
                    Found
                    <span
                        >{{ $page.props.movieCredits.cast.length }} movies</span
                    >
                    in total
                </p>
                <label>Filter by:</label>
                <select>
                    <option value="popularity">Popularity Descending</option>
                    <option value="popularity">Popularity Ascending</option>
                    <option value="rating">Rating Descending</option>
                    <option value="rating">Rating Ascending</option>
                    <option value="date">Release date Descending</option>
                    <option value="date">Release date Ascending</option>
                </select>
            </div>
            <!-- movie cast -->
            <div class="mvcast-item">
                <div
                    class="cast-it"
                    v-for="movieCredit in $page.props.movieCredits.cast"
                    :key="movieCredit.id"
                >
                    <div class="cast-left cebleb-film">
                        <img
                            :src="
                                $store.state.dirImagesTmdb.h50 +
                                    movieCredit.poster_path
                            "
                            alt=""
                        />
                        <div>
                            <inertia-link
                                :href="route('movie.show', movieCredit.id)"
                                >{{ movieCredit.title }}
                            </inertia-link>
                            <p class="time">
                                {{ movieCredit.character }}
                            </p>
                        </div>
                    </div>
                    <p>... {{ movieCredit.release_date }}</p>
                </div>
            </div>
        </v-container>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
