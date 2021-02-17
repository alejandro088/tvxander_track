<template>
    <div>
        <div class="flex-wrap-movielist">
            <div
                class="movie-item-style-2 movie-item-style-1"
                v-for="item in results"
                :key="item.id"
            >
                <img
                    :src="
                        item.posterPath
                            ? `https://image.tmdb.org/t/p/w200${item.posterPath}`
                            : '/images/no-image.png'
                    "
                    alt=""
                />
                <div class="hvr-inner">
                    <inertia-link :href="route('movie.show', { id: item.id })">
                        Read more <i class="ion-android-arrow-dropright"></i>
                    </inertia-link>
                </div>
                <div class="mv-item-infor">
                    <h6>
                        <inertia-link
                            :href="route('movie.show', { id: item.id })"
                            >{{ item.title }}</inertia-link
                        >
                    </h6>
                    <p class="rate">
                        <i class="ion-android-star"></i>
                        <span>{{ item.voteAverage }}</span> /10
                    </p>
                </div>
            </div>

            <div
                class="movie-item-style-2 movie-item-style-1"
                v-for="item in results['shows']"
                :key="item.id"
            >
                <img
                    :src="
                        item.posterPath
                            ? `https://image.tmdb.org/t/p/w200${item.posterPath}`
                            : '/images/no-image.png'
                    "
                    alt=""
                />
                <div class="hvr-inner">
                    <inertia-link :href="route('tv.show', { id: item.id })">
                        Read more <i class="ion-android-arrow-dropright"></i>
                    </inertia-link>
                </div>
                <div class="mv-item-infor">
                    <h6>
                        <inertia-link
                            :href="route('tv.show', { id: item.id })"
                            >{{ item.title }}</inertia-link
                        >
                    </h6>
                    <p class="rate">
                        <i class="ion-android-star"></i>
                        <span>{{ item.voteAverage }}</span> /10
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["results", "query", "type"]
};
</script>

<style></style>
