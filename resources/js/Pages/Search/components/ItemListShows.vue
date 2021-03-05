<template>
    <div>
        <div class="movie-item-style-2" v-for="item in results" :key="item.id">
            <img
                :src="
                    item.poster_path
                        ? $store.getters.poster_size_w154 + item.poster_path
                        : '/images/no-image.png'
                "
                alt=""
            />
            <div class="mv-item-infor">
                <h6>
                    <inertia-link :href="route('tv.show', { id: item.id })">
                        {{ item.name }}
                        <span v-if="item.first_air_date"
                            >({{
                                $date
                                    .fromSQL(item.first_air_date)
                                    .toFormat("yyyy")
                            }})</span
                        >
                    </inertia-link>
                </h6>
                <p class="rate">
                    <i class="ion-android-star"></i
                    ><span>{{ item.vote_average }}</span> /10
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
