<template>
    <div>
        <div class="movie-item-style-2" v-for="item in results" :key="item.id">
            <img
                :src="
                    item.profilePath
                        ? `https://image.tmdb.org/t/p/w200${item.profilePath}`
                        : '/images/no-image.png'
                "
                alt=""
            />
            <div class="mv-item-infor">
                <h6>
                    <inertia-link :href="route('person.show', { id: item.id })">
                        {{ item.name }}
                        <span v-if="item.birthday">({{ item.birthday }})</span>
                    </inertia-link>
                </h6>
                <span>{{ item.placeOfBirth }}</span>
                <p class="describe">
                    {{ item.biography }}
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
