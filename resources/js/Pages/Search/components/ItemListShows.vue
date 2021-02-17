<template>
    <div>
        <div class="movie-item-style-2" v-for="item in results" :key="item.id">
            <img
                :src="
                    item.posterPath
                        ? `https://image.tmdb.org/t/p/w200${item.posterPath}`
                        : '/images/no-image.png'
                "
                alt=""
            />
            <div class="mv-item-infor">
                <h6>
                    <inertia-link :href="route('tv.show', { id: item.id })">
                        {{ item.title }}
                        <span v-if="item.firstAirDate"
                            >({{
                                $date
                                    .fromSQL(item.firstAirDate.date)
                                    .toFormat("yyyy")
                            }})</span
                        >
                    </inertia-link>
                </h6>
                <p class="rate">
                    <i class="ion-android-star"></i
                    ><span>{{ item.voteAverage }}</span> /10
                </p>
                <p class="describe">
                    {{ item.overview }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["results"]
};
</script>

<style></style>
